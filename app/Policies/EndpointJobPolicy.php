<?php

namespace App\Policies;

use App\Models\EndpointJob;
use App\Models\User;

class EndpointJobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EndpointJob $endpointJob): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->maxJobs() < $user->endpointJobs()->count();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EndpointJob $endpointJob): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EndpointJob $endpointJob): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EndpointJob $endpointJob): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EndpointJob $endpointJob): bool
    {
        //
    }
}
