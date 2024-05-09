<?php

use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\TestPacketController;
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
    return view('index');
});


// Route::get('/', function () {
//     return redirect('/test-packet');
// });

Route::get('/test-packet', [TestPacketController::class, 'index'])->name('test.packet');
Route::get('/test_packet/create', [TestPacketController::class, 'store'])->name('test_packet.create');
Route::get('/check-connection', [DatabaseController::class, 'checkConnection']);


