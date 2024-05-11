<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TestToeflController\PaketController;
use App\Http\Middleware\AuthenticateMiddleware;
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

Route::get('/', [AuthenticateController::class, 'showLoginForm'])->name('loginForm');
Route::post('/login', [AuthenticateController::class, 'login'])->name('login');
Route::post('/logout', [AuthenticateController::class, 'destroy'])->name('logout');

Route::middleware([AuthenticateMiddleware::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/PaketSoal', PaketController::class);
    Route::resource('/Profile', UserController::class);
    Route::resource('/HistoryTest', HistoryController::class)->only(['index', 'destroy']);
});
