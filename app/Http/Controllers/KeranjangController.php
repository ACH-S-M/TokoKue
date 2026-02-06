<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VariasiKueModel as Variasi;
use App\Models\KeranjangModel as Keranjang;

class KeranjangController extends Controller
{
    function Index()
    {
        $idUser = auth('pelanggan')->user()->ID_PELANGGAN;
        $keranjang = Keranjang::with('variasi_kue_keranjang.kue')->where('ID_PELANGGAN', '=',$idUser)->get();
        return view("pelanggan.Layouts.keranjang",compact(['keranjang']));
    }
    // Store Ke keranjang
    function store($KD_PRODUK, Request $request)
    {
        $idPelanggan = auth('pelanggan')->user()->ID_PELANGGAN;

        $keranjang = Keranjang::where('ID_PELANGGAN', $idPelanggan)
            ->where('KD_VARIASI', $request->KD_VARIASI)
            ->first();

        try {
            if ($keranjang) {
                // barang sudah ada → tambah qty
                $keranjang->increment('qty');
                return redirect()->route('Keranjang')->with('success', '22');
            } else {
                // barang belum ada → buat baru
                Keranjang::create([
                    'ID_PELANGGAN' => $idPelanggan,
                    'KD_VARIASI'   => $request->KD_VARIASI,
                    'qty'          => 1
                ]);
                return redirect()->route('Keranjang')->with('success', '22');
            }
        } catch (\Exception $e) {
             
        }
    }
}
