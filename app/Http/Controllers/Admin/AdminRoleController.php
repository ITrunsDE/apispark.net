<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRoleUpdateRequest;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminRoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::orderBy('name')->get();

        return view(
            view: 'admin.role.index',
            data: compact('roles'),
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role): View
    {
        return view(
            view: 'admin.role.edit',
            data: compact('role'),
        );
    }

    public function update(AdminRoleUpdateRequest $request, Role $role)
    {
        $role->update($request->validated());

        Notification::make()
            ->title('Role was edited successfully.')
            ->success()
            ->duration(5000)
            ->send();

        return to_route(route: 'admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
