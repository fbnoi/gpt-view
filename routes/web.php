<?php

use App\Http\Controllers\Web\SessionController;
use App\Http\Controllers\Web\IndexController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::controller(SessionController::class)
    ->prefix('session')
    ->name('session.')
    ->group(function () {
        Route::get('/{id}', 'ui')->name('ui');
    });
