<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        $user->load(relations: ['endpoints','endpointJobs', 'repositories']);

        return view(
            view: 'admin.user.edit',
            data: compact('user'),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
