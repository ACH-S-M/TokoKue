<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KueModel as Kue;

class WebController extends Controller
{
    function Index(){
        $terpopuler = Kue::orderBy("jumlah_terjual","asc")->limit(4)->get();
         return view('pelanggan.Layouts.dashboard',compact('terpopuler'));
    }
    function DetailProduk($KD_KUE){
        $thisproduk = Kue::with('variasi_kue')->findOrFail($KD_KUE);
        return view('pelanggan.Layouts.detailproduk',compact('thisproduk'));
    }
}
