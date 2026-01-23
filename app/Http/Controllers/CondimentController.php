<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToppingModel as Topping;
use App\Models\RasaModel as Rasa;
use Illuminate\Support\Facades\DB;




class CondimentController extends Controller
{
    //Ini buat penambahan Topping jika ingin di Tambah 
    public function postCondiment(Request $request)
    {
        $validate = $request->validate([
            "nama_topping"   => "required|string|unique:topping,nama_topping",
            "biaya_tambahan" => "required|integer|min:0",
            "nama_rasa"      => "required|string|unique:rasa,nama_rasa",
        ]);

        DB::transaction(function () use ($validate) {

            Topping::create([
                "nama_topping"   => $validate["nama_topping"],
                "biaya_tambahan" => $validate["biaya_tambahan"],
            ]);

            Rasa::create([
                "nama_rasa" => $validate["nama_rasa"],
            ]);
        });

        return back()->with('success', 'Condiment berhasil ditambahkan');
    }



    //Ini buat relasi condiment nyaa
    public function postCondimentWithVariasi(Request $request)
    {
        //    $validate = $request
    }
}
