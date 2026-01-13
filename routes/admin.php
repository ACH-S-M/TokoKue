<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;

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
});

//untuk Logout 
Route::post('/logoutadmin', [Admin::class, 'Logout'])->name('admin.logout');
