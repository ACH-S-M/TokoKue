<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\KeranjangController as Keranjang;
use App\Http\Controllers\KueController as Kue;
use App\Http\Controllers\WebController as Web;
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

// Halaman publik

Route::get('/', [Web::class,'Index'])->name('home');
Route::get('/produk/detail/{KD_PRODUK}',[Web::class,'DetailProduk'])->name('detailproduk');
Route::post('/Search',[Kue::class, 'searchkue'])->name('kue.search');
// Group route auth
Route::prefix('auth')->group(function () {
    // Menampilkan form
    Route::get('/daftar', function () { return view('pelanggan.daftar'); })->name('daftar');
    Route::get('/login', function () { return view('pelanggan.masuk'); })->name('login');

    // Proses form
    Route::post('/daftar', [Auth::class, 'Register'])->name('daftar.post');
    Route::post('/login', [Auth::class, 'Login'])->name('login.post');
    Route::post('/logout', [Auth::class,'Logout'])->name('pelanggan.logout');
});

//ini kalo sudah terauthentikasi sebagai auth dan juga ini bukan admin 

Route::middleware(['auth:pelanggan','pelangganAuth'])->group(function () {
    Route::get('/keranjang',[Keranjang::class,'Index'])->name('Keranjang');
    Route::post('/keranjang/{KD_PRODUK}',[Keranjang::class,'Store'])->name('Keranjang.store');
    Route::post('/keranjang/update/{KD_VARIASI}',[Keranjang::class,'Update'])->name('keranjang.update');
    Route::delete('/keranjang/delete/{KD_VARIASI}',[Keranjang::class,'Delete'])->name('keranjang.delete');
});


include 'admin.php';