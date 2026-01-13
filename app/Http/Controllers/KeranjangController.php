<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    function Index(){
        return view("pelanggan.Layouts.keranjang");
    }
}
