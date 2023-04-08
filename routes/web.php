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
    Route::get(uri: 'repository/{repository}/send-verification-token', action: [\App\Http\Controllers\RepositoryController::class, 'send_verification'])->name(name: 'repository.send-verification-token');
    Route::post(uri: 'repository/{repository}/verify-verification-token', action: [\App\Http\Controllers\RepositoryController::class, 'verify_repository'])->name(name: 'repository.verify-verification-token');

    // Endpoint
    Route::resource(name: 'endpoint', controller: \App\Http\Controllers\EndpointController::class);

    // EndpointJob
    Route::resource(name: 'endpoint-job', controller: \App\Http\Controllers\EndpointJobController::class);

});

Route::get(uri: 'endpointjob-wizard', action: \App\Http\Livewire\JobWizard::class)->name('endpointjob-wizard');
