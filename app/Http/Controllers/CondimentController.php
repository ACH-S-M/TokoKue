<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToppingModel as Topping;
use App\Models\RasaModel as Rasa;
use App\Models\VariasiKueModel as Variasi;
use Illuminate\Support\Facades\DB;




class CondimentController extends Controller
{
    //Ini buat penambahan Topping jika ingin di Tambah 
    public function postCondiment(Request $request)
    {
        try {

            if ($request->type === 'topping') {

                $validated = $request->validate([
                    'nama'  => 'required|string|unique:topping,nama_topping',
                    'harga' => 'required|numeric|min:0',
                ], [
                    'nama.unique'  => 'Topping dengan nama tersebut sudah ada.',
                    'nama.required' => 'Nama topping wajib diisi.',
                    'harga.required' => 'Harga topping wajib diisi.',
                ]);

                Topping::create([
                    'nama_topping'   => $validated['nama'],
                    'biaya_tambahan' => $validated['harga'],
                ]);

                return back()->with('success', 'Topping berhasil ditambahkan.')->with('active_tab', 'condiment_produk');
            }

            if ($request->type === 'rasa') {

                $validated = $request->validate([
                    'nama' => 'required|string|unique:rasa,nama_rasa',
                ], [
                    'nama.unique'  => 'Rasa dengan nama tersebut sudah ada.',
                    'nama.required' => 'Nama rasa wajib diisi.',
                ]);

                Rasa::create([
                    'nama_rasa' => $validated['nama'],
                ]);
                return back()->with('success', 'Topping berhasil ditambahkan.')->with('active_tab', 'condiment_produk');
            }
            return back()->with('error', 'Tipe condiment tidak valid.');
        } catch (\Exception $e) {

            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }




    //Ini buat relasi condiment nyaa
    public function postCondimentWithVariasi(Request $request)
    {
  

        $request->validate([
            'pilihan_kue' => 'required|exists:kue,KD_KUE',
            'rasa'        => 'nullable|array',
            'topping'     => 'nullable|array',
        ]);

        // ambil variasi yang dipilih (bukan cuma kue)
        $variasiList = Variasi::whereIn('KD_VARIASI', $request->pilihan_kue)->get();
        dd($variasiList);
        foreach ($variasiList as $variasi) {

            if ($request->filled('rasa')) {
                $variasi->rasa()->syncWithoutDetaching($request->rasa);
            }

            if ($request->filled('topping')) {
                $variasi->topping()->syncWithoutDetaching($request->topping);
            }
        }
        return back()->with('success', 'Condiment berhasil diterapkan ke variasi.');
    }
}
