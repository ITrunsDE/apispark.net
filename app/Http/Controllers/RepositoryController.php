<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepositoryDeleteRequest;
use App\Http\Requests\RepositoryStoreRequest;
use App\Http\Requests\RepositoryUpdateRequest;
use App\Http\Requests\RepositoryVerifyRequest;
use App\Models\Repository;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RepositoryController extends Controller
{
    public function index(): View
    {
        $repositories = Repository::query()
            ->with(relations: 'endpointJobs')
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
        $data['verification_token'] = uuid_create(); // token for verification of owning this repository

        Repository::create($data);

        Notification::make()
            ->title('Repository was created successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'repository.index');
    }

    public function show(Repository $repository)
    {
        //todo: create show view with information about where the
    }

    public function edit(Repository $repository): View
    {
        return view(
            view: 'user.repository.edit',
            data: compact('repository'),
        );
    }

    public function update(RepositoryUpdateRequest $request, Repository $repository)
    {
        $data = $request->validated();

        // check if there is already a ingest-token with the same id
        $check_ingest_token = Repository::query()
            ->where(column: 'ingest_token', operator: '=', value: $data['ingest_token'])
            ->where(column: 'id', operator: '!=', value: $repository->id)
            ->count();

        // if there is another ingest-token present
        // redirect to edit page with error message
        if ($check_ingest_token > 0) {
            Notification::make()
                ->title('Repository could not be updated. The ingest token is used by another repository.')
                ->danger()
                ->duration(5000)
                ->send();

            return to_route(route: 'repository.edit', parameters: $repository);
        }

        // if the ingest_token get changed, then force new validation
        if ($data['ingest_token'] !== $repository->ingest_token) {
            $data['verified_at'] = null;
        }

        // update data
        $repository->update($data);

        Notification::make()
            ->title('Repository was updated successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'repository.index');
    }

    public function destroy(RepositoryDeleteRequest $request, Repository $repository)
    {
        $repository->delete();

        Notification::make()
            ->title('Repository was deleted successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'repository.index');
    }

    public function send_verification(Repository $repository): RedirectResponse
    {
        $repository->send_verification();

        return to_route(route: 'repository.edit', parameters: $repository);
    }

    public function verify_repository(RepositoryVerifyRequest $request, Repository $repository): RedirectResponse
    {
        if ($request->validated(key: 'verification_token') === $repository->verification_token) {
            $repository->update(['verified_at' => now()]);
            Notification::make()
                ->title('Repository successfully verified.')
                ->success()
                ->duration(5000)
                ->send();
        } else {
            Notification::make()
                ->title('Repository could not be verified.')
                ->danger()
                ->duration(5000)
                ->send();
        }

        return to_route(route: 'repository.edit', parameters: $repository);
    }
}
