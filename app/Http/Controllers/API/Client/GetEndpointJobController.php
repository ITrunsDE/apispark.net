<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\EndpointJobResource;
use App\Models\EndpointJob;
use Illuminate\Http\Request;

class GetEndpointJobController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        // get information for endpointJob to run
        return EndpointJobResource::collection(
            EndpointJob::query()
                ->active()
                ->get());
    }
}
