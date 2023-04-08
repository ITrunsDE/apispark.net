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
        public string          $base_url,
        public readonly string $host
    )
    {
        // check if the base url is correct
        if (!Str::startsWith(haystack: $this->base_url, needles: 'https://')) {
            $this->base_url = 'https://' . $this->base_url;
        }

        // create a client with all the headers
        $this->client = self::withToken(token: $this->ingest_token)
            ->baseUrl(url: $this->base_url)
//            ->withHeaders(['Content-Type' => 'application/json'])
            ->acceptJson();
    }

    public function create_unstructured_element(string|array $messages): void
    {
        // check if array, and parse each line
        if (is_array($messages)) {
            foreach ($messages as $message) {
                $this->create_unstructured_element($message);
            }
        } else {
            $this->messages[] = $messages;
        }
    }

    public function create_structured_event(array $messages): void
    {
        $this->events[] = [
            'timestamp' => now(),
            'attributes' => $messages
        ];
    }

    public function send_unstructured_data(): Response
    {
        $data = [[
            'fields' => [
                $this->identifier => $this->host
            ],
            'messages' => $this->messages
        ]];

        return $this->client->post(url: config(key: 'logscale.ingest_unstructured_data'), data: $data);
    }

    public function send_structured_data(): Response
    {
        $data = [[
            'tags' => [
                $this->identifier => $this->host
            ],
            'events' => $this->events
        ]];

        return $this->client->post(url: config(key: 'logscale.ingest_structured_data'), data: $data);
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
