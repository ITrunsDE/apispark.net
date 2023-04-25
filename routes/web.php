<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EndpointController;
use App\Http\Controllers\EndpointJobController;
use App\Http\Controllers\RepositoryController;
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

Route::view(uri: '/', view: 'start')->name(name: 'start');
Route::view(uri: '/features', view: 'features')->name(name: 'features');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get(uri: 'dashboard', action: DashboardController::class)->name(name: 'dashboard');

    // Repository
    Route::resource(name: 'repository', controller: RepositoryController::class);
//    Route::get(uri: 'repository/{repository}/send-verification-token', action: [RepositoryController::class, 'send_verification'])->name(name: 'repository.send-verification-token');
//    Route::post(uri: 'repository/{repository}/verify-verification-token', action: [RepositoryController::class, 'verify_repository'])->name(name: 'repository.verify-verification-token');

    // Endpoint
    Route::resource(name: 'endpoint', controller: EndpointController::class)->except(['show']);

    // EndpointJob
    Route::resource(name: 'endpoint-job', controller: EndpointJobController::class);
    Route::get(uri: 'endpoint-job/activate/{endpointJob}', action: [EndpointJobController::class, 'activate'])->name('endpoint-job.activate');
    Route::get(uri: 'endpoint-job/deactivate/{endpointJob}', action: [EndpointJobController::class, 'deactivate'])->name('endpoint-job.deactivate');

    // Admin Functions
    Route::middleware(['role:Super-Admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::resource(name: 'user', controller: \App\Http\Controllers\Admin\AdminUserController::class);
        Route::resource(name: 'role', controller: \App\Http\Controllers\Admin\AdminRoleController::class);

    });

});
