<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeranjangModel as Keranjang;
class pesananController extends Controller
{
    function Index(){
        $user = auth()->guard("pelanggan")->user()->ID_PELANGGAN;
        $keranjang = Keranjang::with("variasi_kue_keranjang.kue")->where("ID_PELANGGAN", "=",$user)->get();
        return view("pelanggan.Layouts.Checkout",compact("keranjang"));

    }
    function Checkout(){

    }
}
