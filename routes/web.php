<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect('http://127.0.0.1:8000/test-packet/');
});

Route::get('/test-packet', [TestPacketController::class, 'index']);
Route::get('/test_packet/create', [TestPacketController::class, 'store'])->name('test_packet.create');

