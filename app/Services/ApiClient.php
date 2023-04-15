<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Endpoint;
use App\Models\Repository;
use App\Models\User;
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
            } catch (\Exception $e) {
                dd($e);
            }
        }

        return true;
    }

    public function get(Endpoint $endpoint): Response
    {
        $http = HTTP::retry(times: 3, sleepMilliseconds: 1500)
            ->withUserAgent(userAgent: 'apispark.net/1.0')
            ->acceptJson();

        // add authentication methods
        if ($endpoint->authentication === 'bearer') {
            $http = $http->withToken($endpoint->authentication_parameters['bearer']);
        }

        // Basic HTTP REST api call
        return $http->get($endpoint->url);
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

        // parse data and send
        foreach ($data as $entry) {
            $logscale_client->create_structured_event($entry);
        }

        // send data
        $logscale_client->send();
    }
}
