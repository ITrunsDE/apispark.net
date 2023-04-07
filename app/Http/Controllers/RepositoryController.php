<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryDeleteRequest;
use App\Http\Requests\RepositoryStoreRequest;
use App\Http\Requests\RepositoryUpdateRequest;
use App\Models\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RepositoryController extends Controller
{
    public function index(): View
    {
        $repositories = Repository::query()
            ->where(column: 'user_id', operator: '=', value: auth()->id())
            ->orderBy(column: 'name')
            ->get();

        return view(
            view: 'user.repository.index',
            data: compact('repositories'),
        );
    }

    public function create(): View
    {
        return view(
            view: 'user.repository.create'
        );
    }

    public function store(RepositoryStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // add user for the repository
        $data['user_id'] = auth()->id();

        Repository::create($data);

        return to_route(route: 'repository.index')->banner('Repository was created successfully.');
    }

    public function show(Repository $repository)
    {
        //
    }

    public function edit(Repository $repository): View
    {
        return view(
            view: 'user.repository.edit',
            data: compact('repository'),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RepositoryUpdateRequest $request, Repository $repository)
    {
        $data = $request->validated();

        $repository->update($data);

        return to_route(route: 'repository.index')->banner('Repository was updated successfully.');
    }

    public function destroy(RepositoryDeleteRequest $request, Repository $repository)
    {

        $repository->delete();

        return to_route(route: 'repository.index')->banner('Repository was deleted successfully.');
    }
}
