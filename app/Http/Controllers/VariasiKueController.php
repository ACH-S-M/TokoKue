<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KueModel as Kue;
use App\Models\VariasiKueModel as Variasi;

class VariasiKueController extends Controller
{
    function PostVariasiKue(Request $request)
    {
        $KD_VARIASI = $request->KD_KUE . $request->ukuran_kue;
        $validate = $request->validate([
            "harga_kue" => 'required|integer',
        ]);
        $variasiKue = Variasi::create([
            'KD_VARIASI' => $KD_VARIASI,
            'KD_KUE' => $request->KD_KUE,
            'harga_kue' => $validate['harga_kue'],
            'ukuran_kue' => $request->ukuran_kue
        ]);
        if($variasiKue){
            return redirect()->back()->with('success','Berhasil');
        }
    }
}
