<?php
declare(strict_types=1);

namespace App\Services;

use App\Jobs\RunEndpointJobForUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class QueueEndpointJobForUser
{
    public function __invoke(): void
    {
        $users = User::query()
            ->whereHas(relation: 'endpointJobs', callback: function (Builder $query) {
                $query->where(column: 'active', operator: '=', value: 1);
            })
            ->get();

        foreach ($users as $user) {

            // dispatch job to run
            RunEndpointJobForUser::dispatch(user: $user);

        }
    }
}
