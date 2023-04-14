<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->withCount(relations: ['EndpointJobs'])
            ->orderBy(column: 'name')
            ->get();

        return view(
            view: 'admin.user.index',
            data: compact('users'),
        );
    }

    public function edit(User $user): View
    {
        $user->load(relations: ['endpoints', 'endpointJobs', 'repositories']);

        return view(
            view: 'admin.user.edit',
            data: compact('user'),
        );
    }

    public function update(AdminUserUpdateRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        // sync role for the user
        $user->syncRoles($data['role']);

        $user->update($data);

        Notification::make()
            ->title('User was edited successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'admin.user.index');
    }

    public function destroy(User $user)
    {
        //
    }
}
