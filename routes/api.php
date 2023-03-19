<?php

use App\Http\Controllers\Api\SessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::controller(SessionController::class)
        ->prefix('session')
        ->name('session.')
        ->group(function () {
            Route::get('/history/{id}', 'history')->name('history');
            Route::post('/send/{id}', 'send')->name('send');
        });
});
