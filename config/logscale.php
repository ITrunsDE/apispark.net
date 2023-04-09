<?php

return [
    'ingest_unstructured_data' => '/api/v1/ingest/humio-unstructured',
    'ingest_structured_data' => '/api/v1/ingest/humio-structured',
    'ingest_raw_data' => '/api/v1/ingest/raw',
    'ingest_raw_json_data' => '/api/v1/ingest/json',
    'base_urls' => [
        'cloud.community.humio.com',
        'cloud.humio.com',
    ],
    'basic_headers' => [
        'User-Agent' => 'ApiSpark.net/1.0',
        'Host' => 'apiclient.apispark.net',
    ]
];
