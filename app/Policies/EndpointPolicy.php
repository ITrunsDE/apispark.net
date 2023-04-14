<?php

namespace App\Policies;

use App\Models\Endpoint;
use App\Models\User;

class EndpointPolicy
{
    public function viewAny(User $user): bool
    {
        $user->can(abilities: 'use_endpoint');
    }

    public function view(User $user, Endpoint $endpoint): bool
    {
        $user->can(abilities: 'use_endpoint');
    }

    public function create(User $user): bool
    {
        $user->can(abilities: 'use_endpoint');
    }

    public function update(User $user, Endpoint $endpoint): bool
    {
        $user->can(abilities: 'use_endpoint');
    }

    public function delete(User $user, Endpoint $endpoint): bool
    {
        $user->can(abilities: 'use_endpoint');
    }

    public function restore(User $user, Endpoint $endpoint): bool
    {
        $user->can(abilities: 'use_endpoint');
    }

    public function forceDelete(User $user, Endpoint $endpoint): bool
    {
        $user->can(abilities: 'use_endpoint');
    }
}
