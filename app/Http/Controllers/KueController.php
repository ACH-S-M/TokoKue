<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KueModel as Kue;
use Illuminate\Support\Facades\Storage;
use App\Models\VariasiKueModel as Variasi;
class KueController extends Controller
{
    function indexKue()
    {
        $kues = Kue::all();
        $variasikues = Variasi::all();
        $getKue = null;
        return view("admin.Layouts.produk", compact('kues', 'variasikues', 'getKue'));
    }
    function PostKue(Request $request)
    {
        $validate = $request->validate([
            'nama_kue' => 'required',
            'gambar_kue' => 'required|image|max:2048',
        ]);

        $filename = time() . '_' . uniqid() . '.' . $request->file('gambar_kue')->getClientOriginalExtension();
        $request->file('gambar_kue')->move(public_path('img/produk'), $filename);

        $kue = Kue::create([
            "nama_kue" => $validate["nama_kue"],
            "gambar_kue" => $filename,
            "deskripsi_kue" => $request->deskripsi_kue,
        ]);
        if ($kue) {
            return redirect()->route("admin.produk")->with("success", "1");
        }
    }

    function deleteKue(Kue $kue)
    {
        Storage::delete('/img/produk/' . $kue->gambar_kue);
        $kue->delete();
        return redirect()->route("admin.produk")->with("success", "0");
    }

    function editKue($KD_KUE)
    {
        $getKue = Kue::findOrFail($KD_KUE);
        $kues = Kue::all();
        return view('admin.Layouts.produk', compact(['getKue', 'kues']));
    }
    function updateKue(Request $request, $KD_KUE)
    {
        $validate = $request->validate([
            "nama_kue" => "sometimes|string",
            "gambar_kue" => "sometimes|nullable|image|max:2048",
            "deskripsi_kue" => "sometimes|nullable|string"
        ]);
        $kue = Kue::findOrFail($KD_KUE)->update($validate);
        return  redirect()->route("admin.produk")->with("success", "0");
    }

    
}
