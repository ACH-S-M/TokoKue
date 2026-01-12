<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController as Admin;


Route::get('/loginadmin',function(){
    return view('admin.adminmasuk');
});

Route::get('/admindashboard',function(){ 
    return view('admin.admindashboard');
})->name('admin.home');

Route::post('/loginadmin',[Admin::class,'Login'])->name('admin.post');


?>