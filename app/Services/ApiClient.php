<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Endpoint;
use App\Models\Repository;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final class ApiClient
{
    public array|Collection $jobs;

    private array $basic_headers;

    public function __construct(
        public readonly User $user
    ) {
        $this->jobs = $this->user->endpointJobs->where('active', 1);
        $this->basic_headers = config(key: 'logscale.basic_headers');
    }

    public function collect(): bool
    {
        // check if job can run
        foreach ($this->jobs as $job) {

            // check if the last_run + interval is greater than now
            if (
                ! is_null($job->last_run) &&
                $job->last_run->addMinutes($job->interval->interval) > now()
            ) {
                continue;
            }

            // queue all data for execution
            // make request with all informations
            $response = $this->get(endpoint: $job->endpoint);

            // update last run
            $job->update(['last_run' => now()]);

            // try to fetch json data
            try {
                $this->ingest(repository: $job->repository, data: $response->json());
            } catch (Exception $e) {
                dd($e);
            }
        }

        return true;
    }

    public function get(Endpoint $endpoint): Response
    {
        $query_params = [];

        $http = HTTP::retry(times: 3, sleepMilliseconds: 1500)
            ->withUserAgent(userAgent: 'apispark.net/1.0')
            ->acceptJson();

        // add authentication methods
        if ($endpoint->authentication === 'bearer') {
            // Authentication - Bearer Token
            $http = $http->withToken($endpoint->authentication_parameters['bearer']);
        } elseif ($endpoint->authentication === 'api') {
            // Authentication - API Header/Query
            if ($endpoint->authentication_parameters['api_add_to'] === 'header') {
                // add api to header
                $header = [
                    $endpoint->authentication_parameters['api_key'] => $endpoint->authentication_parameters['api_value'],
                ];
                $http = $http->withHeaders($header);
            } elseif ($endpoint->authentication_parameters['api_add_to'] === 'query') {
                // add api key/value to parameters
                array_merge($query_params,
                    [
                        $endpoint->authentication_parameters['api_key'] => $endpoint->authentication_parameters['api_value'],
                    ]
                );
            }
        } elseif ($endpoint->authentication === 'basic') {
            // Authentication - Basic Authentication
            $http = $http->withBasicAuth(
                username: $endpoint->authentication_parameters['basic_username'],
                password: $endpoint->authentication_parameters['basic_password']
            );
        }
//        $response = $http->get($endpoint->url, $query_params);

        // Basic HTTP REST api call
        return $http->get($endpoint->url, $query_params);
    }

    private function ingest(Repository $repository, array $data): void
    {
        // create LogscaleClient
        $logscale_client = new LogscaleClient(
            repository: $repository->name,
            ingest_token: $repository->ingest_token,
            base_url: $repository->base_url,
            host: 'APISpark.net'
        );

        // check if the array is nested
        if ($this->is_nested_array(array: $data)) {
            foreach ($data as $entry) {
                $logscale_client->create_structured_event($entry);
            }
        } else {
            $logscale_client->create_structured_event($data);
        }

        // send data
        $logscale_client->send();
    }

    private function is_nested_array(array|string $array): bool
    {
        if (is_array(value: $array)) {
            foreach ($array as $element) {
                if (is_array(value: $element)) {
                    return true;
                }
            }
        }

        return false;
    }
}
