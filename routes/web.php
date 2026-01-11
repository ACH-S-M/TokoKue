<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
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
    return view('dashboard');
});
Route::get('/daftar', function () {
    return view('daftar');
})->name('daftar');
Route::get('/masuk', function () {
    return view('masuk');
})->name('login');
Route::post('/daftar', [Auth::class,'Register'])->name('daftar.post');