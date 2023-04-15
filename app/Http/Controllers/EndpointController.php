<?php

namespace App\Http\Controllers;

use App\Http\Requests\EndpointStoreRequest;
use App\Http\Requests\EndpointUpdateRequest;
use App\Models\Endpoint;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

        Notification::make()
            ->title('Endpoint was created successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint.index');
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

        Notification::make()
            ->title('Endpoint was updated successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint.index');
    }

    public function destroy(Endpoint $endpoint)
    {
        $endpoint->delete();

        Notification::make()
            ->title('Endpoint was deleted successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint.index');
    }
}
