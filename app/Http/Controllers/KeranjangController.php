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
        $keranjang = Keranjang::with('variasi_kue_keranjang.kue')->where('ID_PELANGGAN', '=', $idUser)->get();
        return view("pelanggan.Layouts.keranjang", compact(['keranjang']));
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

    public function Update(Request $request, $KD_VARIASI)
    {

        $request->validate([
            'qty_change' => 'required|in:-1,1'
        ]);

        $item = Keranjang::where('ID_PELANGGAN', auth('pelanggan')->user()->ID_PELANGGAN)
            ->where('KD_VARIASI', $KD_VARIASI)
            ->firstOrFail();

        $newQty = $item->qty + $request->qty_change;

        if ($newQty <= 0) {
            $item->delete();
            return redirect()->back()->with('success','item berhasil dihapus dari keranjang');
        } else {
            $item->update(['qty' => $newQty]);
            return redirect()->back()->with('success');
        }

        return back();
    }
    public function Delete($KD_VARIASI)
    {
        $item = Keranjang::where('ID_PELANGGAN', auth('pelanggan')->user()->ID_PELANGGAN)
        ->where('KD_VARIASI',$KD_VARIASI)->firstOrFail();
        $item->delete();
        return redirect()->back();
    }
}
