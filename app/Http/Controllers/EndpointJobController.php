<?php

namespace App\Http\Controllers;

use App\Http\Requests\EndpointJobDeleteRequest;
use App\Http\Requests\EndpointJobStoreRequest;
use App\Http\Requests\EndpointJobUpdateRequest;
use App\Models\Endpoint;
use App\Models\EndpointJob;
use App\Models\Interval;
use App\Models\Repository;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EndpointJobController extends Controller
{
    public function index(): View
    {
        $max_jobs = auth()->user()->maxJobs();

        $jobs = EndpointJob::query()
            ->with(relations: ['interval', 'repository', 'endpoint'])
            ->where(column: 'user_id', operator: '=', value: auth()->id())
//            ->orderBy('')
            ->get();

        return view(
            view: 'user.endpoint_job.index',
            data: compact('jobs', 'max_jobs')
        );
    }

    public function create(): View
    {
        $endpoints = Endpoint::query()
            ->where(column: 'user_id', operator: '=', value: auth()->id())
            ->orderBy(column: 'name')
            ->pluck(column: 'name', key: 'id');

        $repositories = Repository::query()
            ->where(column: 'user_id', operator: '=', value: auth()->id())
            ->active()
            ->orderBy(column: 'name')
            ->pluck(column: 'name', key: 'id');

        $intervals = Interval::query()
            ->orderBy(column: 'interval')
            ->pluck(column: 'name', key: 'id');

        $can_not_create_jobs = auth()->user()->endpointJobs()->count() >= auth()->user()->maxJobs();

        return view(
            view: 'user.endpoint_job.create',
            data: compact(
                'endpoints',
                'repositories',
                'intervals',
                'can_not_create_jobs'
            )
        );
    }

    public function store(EndpointJobStoreRequest $request): RedirectResponse
    {
        if (auth()->user()->maxJobs() <= EndpointJob::where(column: 'user_id', operator: '=', value: auth()->id())->count()) {
            Notification::make()
                ->title('Job can not be created. Max licensed jobs reached.')
                ->warning()
                ->duration(5000)
                ->send();

            return to_route(route: 'endpoint-job.index');
        }

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['active'] = true;

        EndpointJob::create($data);

        Notification::make()
            ->title('Job was created successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint-job.index');
    }

    public function show(EndpointJob $endpointJob)
    {
        //
    }

    public function edit(EndpointJob $endpointJob): View
    {
        $endpoints = Endpoint::query()
            ->where(column: 'user_id', operator: '=', value: auth()->id())
            ->orderBy(column: 'name')
            ->pluck(column: 'name', key: 'id');

        $repositories = Repository::query()
            ->where(column: 'user_id', operator: '=', value: auth()->id())
            ->active()
            ->orderBy(column: 'name')
            ->pluck(column: 'name', key: 'id');

        $intervals = Interval::query()
            ->orderBy(column: 'interval')
            ->pluck(column: 'name', key: 'id');

        return view(
            view: 'user.endpoint_job.edit',
            data: compact(
                'endpointJob',
                'endpoints',
                'repositories',
                'intervals'
            )
        );
    }

    public function update(EndpointJobUpdateRequest $request, EndpointJob $endpointJob): RedirectResponse
    {
        $data = $request->validated();
        $data['active'] = $data['active'] === 'true' ? 1 : 0;
        $endpointJob->update($data);

        Notification::make()
            ->title('Job was updated successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint-job.index');
    }

    public function destroy(EndpointJobDeleteRequest $request, EndpointJob $endpointJob): RedirectResponse
    {
        $endpointJob->delete();

        Notification::make()
            ->title('Job was deleted successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint-job.index');
    }

    public function activate(EndpointJob $endpointJob): RedirectResponse
    {
        $endpointJob->update(['active' => 1]);

        Notification::make()
            ->title('Job was activated successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint-job.index');
    }

    public function deactivate(EndpointJob $endpointJob): RedirectResponse
    {
        $endpointJob->update(['active' => 0]);

        Notification::make()
            ->title('Job was deactivated successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'endpoint-job.index');
    }
}
