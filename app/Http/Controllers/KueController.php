<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KueController extends Controller
{
    function indexKue(){
        return view("admin.Layouts.produk");
    }
    function indexVariasiKue(){
        return view("admin.Layouts.variasiproduk");
    }
}
