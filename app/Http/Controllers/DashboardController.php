<?php

namespace App\Http\Controllers;

use App\Models\Endpoint;
use App\Models\EndpointJob;
use App\Models\Repository;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $max_jobs = auth()->user()->maxJobs();
        $jobs = EndpointJob::where(column: 'user_id', operator: '=', value: auth()->id())->count();
        $endpoints = Endpoint::where(column: 'user_id', operator: '=', value: auth()->id())->count();
        $repositories = Repository::where(column: 'user_id', operator: '=', value: auth()->id())->count();

        return view(
            view: 'user.dashboard',
            data: compact(
                'max_jobs',
                'jobs',
                'endpoints',
                'repositories',
            )
        );
    }
}
