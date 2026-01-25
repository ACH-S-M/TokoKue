<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KueModel as Kue;
use App\Models\VariasiKueModel as Variasi;

class VariasiKueController extends Controller
{
    function PostVariasiKue(Request $request)
    {
     
        $validate = $request->validate([
            'KD_KUE'        => 'required|exists:kue,KD_KUE',
            'ukuran_kue'    => 'required|string|max:20',
            'harga_kue'     => 'required|integer|min:0',
            'berat_bersih'  => 'required|string',
            'diameter_kue'  => 'nullable|numeric|min:0',
            'tinggi_kue'    => 'nullable|numeric|min:0',
            "satuan_berat" =>  'required|in:gram,kg',
        ]);
        $beratFinal = $validate['berat_bersih'].' '.$validate['satuan_berat'];
        $variasiKue = Variasi::create([
            'KD_KUE' => $validate['KD_KUE'],
            'harga_kue' => $validate['harga_kue'],
            'berat_bersih' => $beratFinal,
            'diameter_kue' => $validate['diameter_kue'],
            'tinggi_kue' => $validate ['tinggi_kue'],
            'ukuran_kue' => $request->ukuran_kue,
        ]);
        if($variasiKue){
            return redirect()->back()->with('success','Berhasil');
        }
    }
}
