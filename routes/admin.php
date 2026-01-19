<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\KueController as Kue;

//untuk Rute Login admin
Route::get('/loginadmin', function () {
    return view('admin.adminmasuk');
})->name('admin.login');

//post input email dan password 
Route::post('/loginadmin', [Admin::class, 'Login'])->name('admin.post');

//jika terautentikasi dan terotorisasi sebagai admin maka 
Route::middleware([ 'adminAuth'])->group(function () {
    Route::get('/admindashboard', function () {
        return view('admin.Layouts.dashboard');
    })->name('admin.home');
    
    // Ini untuk Kue
    Route::get('/produk', [Kue::class,'indexKue'])->name('admin.produk');
    Route::post('/produk',[Kue::class,'PostKue'])->name('admin.post.produk');
    Route::delete('/produk/Hapus/{kue}',[Kue::class,'deleteKue'])->name('admin.delete.produk');
    Route::get('/produk/{KD_KUE}',[Kue::class,'editKue'])->name('admin.edit.produk');
    Route::put('/produk/update/{KD_KUE}', [Kue::class,'updateKue'])->name('admin.update.produk');

    //  Ini untuk variasi Kue
    Route::get('/variasiproduk', [Kue::class,'indexVariasiKue'])->name('admin.variasiproduk');

    //untuk Logout 
Route::post('/logoutadmin', [Admin::class, 'Logout'])->name('admin.logout');

});

