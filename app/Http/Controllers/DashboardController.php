<?php

namespace App\Http\Controllers;

use App\Models\Endpoint;
use App\Models\EndpointJob;
use App\Models\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $jobs = EndpointJob::where(column: 'user_id', operator: '=', value: auth()->id())->count();
        $endpoints = Endpoint::where(column: 'user_id', operator: '=', value: auth()->id())->count();
        $repositories = Repository::where(column: 'user_id', operator: '=', value: auth()->id())->count();

        return view(
            view: 'user.dashboard',
            data: compact(
                'jobs',
                'endpoints',
                'repositories',
            )
        );
    }
}
