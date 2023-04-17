<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

final class LogscaleClient extends HTTP
{
    public array $messages = [];

    public string $identifier = 'host';

    public array $events = [];

    public function __construct(
        public readonly string $repository,
        public readonly string $ingest_token,
        public string $base_url,
        public readonly string $host
    ) {
        // check if the base url is correct
        if (! Str::startsWith(haystack: $this->base_url, needles: 'https://')) {
            $this->base_url = 'https://'.$this->base_url;
        }

        // create a client with all the headers
        $this->client = self::withToken(token: $this->ingest_token)
            ->baseUrl(url: $this->base_url)
            ->acceptJson();
    }

    public function send(): bool|string
    {
        $send = false;
        $url = '';
        $data = [];

        // send all data
        if (count($this->events) > 0) {
            // structured_data
            $data = [[
                'tags' => [
                    $this->identifier => $this->host,
                ],
                'events' => $this->events,
            ]];

            $url = config(key: 'logscale.ingest_structured_data');
            $send = true;
        } elseif (count($this->messages) > 0) {
            // unstructured_data
            $data = [[
                'fields' => [
                    $this->identifier => $this->host,
                ],
                'messages' => $this->messages,
            ]];

            $url = config(key: 'logscale.ingest_unstructured_data');
            $send = true;
        }

        // if we got data to send
        if ($send) {
            $response = $this->client->post(url: $url, data: $data);

            if ($response->successful()) {
                return true;
            }

            // ToDo: handle exceptions for any error
            return $response->body();
        }

        return true;
    }

    public function create_unstructured_element(string|array $messages): LogscaleClient
    {
        // check if array, and parse each line
        if (is_array($messages)) {
            foreach ($messages as $message) {
                $this->create_unstructured_element($message);
            }
        } else {
            $this->messages[] = $messages;
        }

        return $this;
    }

    public function create_structured_event(array $messages): LogscaleClient
    {
        $this->events[] = [
            'timestamp' => now(),
            'attributes' => $messages,
        ];

        return $this;
    }

    public function ingest_json_data($data): Response
    {
        return $this->client->post(url: config(key: 'logscale.ingest_structured_data'), data: 'data');
    }

    public function ingest_raw_data(string $data): Response
    {
        return $this->client->post(url: config(key: 'logscale.ingest_raw_data'), data: 'data');
    }

    public function ingest_raw_json_data(array|string $data): Response
    {
        return $this->client->post(url: config(key: 'logscale.ingest_raw_json_data'), data: 'data');
    }
}
