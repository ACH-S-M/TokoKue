<?php

namespace App\Http\Controllers;

use App\Models\KueModel as Kue;
use Illuminate\Http\Request;
use App\Models\RasaModel as Rasa;
use App\Models\VariasiKueModel as Variasi;
use App\Models\ToppingModel as Topping;
use Illuminate\Support\Facades\Storage;

class KueController extends Controller
{
    public function indexKue($KD_KUE = null, $KD_VARIASI = null)
    {
        $condiments = Variasi::with(['topping', 'rasa', 'kue'])->get();

        $kues = Kue::with([
            'variasi_kue' => function ($q) {
                $q->select(
                    'KD_VARIASI',
                    'KD_KUE',
                    'harga_kue',
                    'diameter_kue',
                    'tinggi_kue',
                    'ukuran_kue',
                    'berat_bersih',
                );
            },
        ])->get([
            'KD_KUE',
            'nama_kue',
            'deskripsi_kue',
            'stok',
            'jumlah_terjual',
        ]);

        $rasalist = Rasa::all();
        $toppinglist = Topping::all();

        $getKue = null;
        $getVariasi = null;
        $activeTab = 'produk'; // default tab saya buat 
       
        if ($KD_KUE) {
            $getKue = Kue::findOrFail($KD_KUE);
            $activeTab = 'produk';
        }

        if ($KD_VARIASI) {
            $getVariasi = Variasi::findOrFail($KD_VARIASI);
            $activeTab = 'variasi_produk';
        }

        return view(
            'admin.Layouts.produk',
            compact(
                'kues',
                'condiments',
                'rasalist',
                'toppinglist',
                'getKue',
                'getVariasi',
                'activeTab'
            )
        );
    }


    public function PostKue(Request $request)
    {
        $validate = $request->validate([
            'nama_kue' => 'required',
            'gambar_kue' => 'required|image|max:2048',
        ]);

        $filename = time() . '_' . uniqid() . '.' . $request->file('gambar_kue')->getClientOriginalExtension();
        $request->file('gambar_kue')->move(public_path('img/produk'), $filename);

        $kue = Kue::create(attributes: [
            'nama_kue' => $validate['nama_kue'],
            'gambar_kue' => $filename,
            'deskripsi_kue' => $request->deskripsi_kue,
        ]);
        if ($kue) {
            return redirect()->route('admin.produk')->with('success', '1');
        }
    }

    public function deleteKue(Kue $kue)
    {
        Storage::delete('/img/produk/' . $kue->gambar_kue);
        $kue->delete();

        return redirect()->route('admin.produk')->with('success', '0');
    }

    public function editKue(Request $request,$KD_KUE)
    {
         session(['active_tab' => $request->active_tab ?? 'variasi_kue']);
        return $this->indexKue($KD_KUE, null);
    }
    public function editVariasi(Request $request,$KD_VARIASI)
    {
        session(['active_tab' => $request->active_tab ?? 'produk']);
        return $this->indexKue(KD_KUE: null, KD_VARIASI: $KD_VARIASI);
    }

    public function updateKue(Request $request, $KD_KUE)
    {
        $validate = $request->validate([
            'nama_kue' => 'sometimes|string',
            'gambar_kue' => 'sometimes|nullable|image|max:2048',
            'deskripsi_kue' => 'sometimes|nullable|string',
        ]);
        $kue = Kue::findOrFail($KD_KUE)->update($validate);

        return redirect()->route('admin.produk')->with('success', '0');
    }
   
}
