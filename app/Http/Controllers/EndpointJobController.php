<?php

namespace App\Http\Controllers;

use App\Http\Requests\EndpointJobStoreRequest;
use App\Http\Requests\EndpointJobUpdateRequest;
use App\Models\Endpoint;
use App\Models\EndpointJob;
use App\Models\Interval;
use App\Models\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EndpointJobController extends Controller
{
    public function index(): View
    {
        $jobs = EndpointJob::query()
            ->with(relations: ['interval', 'repository', 'endpoint'])
            ->where(column: 'user_id', operator: '=', value: auth()->id())
//            ->orderBy('')
            ->get();

        return view(
            view: 'user.endpoint_job.index',
            data: compact('jobs')
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
            ->orderBy(column: 'name')
            ->pluck(column: 'name', key: 'id');

        $intervals = Interval::query()
            ->orderBy(column: 'interval')
            ->pluck(column: 'name', key: 'id');

        return view(
            view: 'user.endpoint_job.create',
            data: compact(
                'endpoints',
                'repositories',
                'intervals',
            )
        );
    }

    public function store(EndpointJobStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['active'] = true;

        EndpointJob::create($data);

        return to_route(route: 'endpoint-job.index')->banner('Job created successfully');
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

        return to_route(route: 'endpoint-job.index')->banner('Job updated successfully');
    }

    public function destroy(EndpointJob $endpointJob)
    {
        //
    }
}
