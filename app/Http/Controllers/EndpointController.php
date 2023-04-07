<?php

namespace App\Http\Controllers;

use App\Http\Requests\EndpointStoreRequest;
use App\Http\Requests\EndpointUpdateRequest;
use App\Models\Endpoint;
use App\Models\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EndpointController extends Controller
{
    public function index(): View
    {
        $endpoints = Endpoint::query()
            ->where(column: 'user_id', operator: '=', value: auth()->id())
            ->orderBy(column: 'name')
            ->get();

        return view(
            view: 'user.endpoint.index',
            data: compact('endpoints')
        );
    }

    public function create(): View
    {
        return view(
            view: 'user.endpoint.create'
        );
    }

    public function store(EndpointStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // add user for the endpoint
        $data['user_id'] = auth()->id();

        Endpoint::create($data);

        return to_route(route: 'endpoint.index')->banner('Endpoint was created successfully.');
    }

    public function show(Endpoint $endpoint)
    {
        //todo: create show view with information about where the
    }

    public function edit(Endpoint $endpoint): View
    {
        return view(
            view: 'user.endpoint.edit',
            data: compact('endpoint'),
        );
    }

    public function update(EndpointUpdateRequest $request, Endpoint $endpoint)
    {
        $data = $request->validated();
        $endpoint->update($data);

        return to_route(route: 'endpoint.index')->banner('Endpoint was updated successfully.');
    }

    public function destroy(Endpoint $endpoint)
    {
        $endpoint->delete();

        return to_route(route: 'endpoint.index')->banner('Endpoint was deleted successfully.');
    }
}
