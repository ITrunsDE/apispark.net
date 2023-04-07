<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Repository
    Route::resource(name: 'repository', controller: \App\Http\Controllers\RepositoryController::class);

    // Endpoint
    Route::resource(name: 'endpoint', controller: \App\Http\Controllers\EndpointController::class);

});

Route::get(uri: 'job-wizard', action: \App\Http\Livewire\JobWizard::class)->name('job-wizard');
