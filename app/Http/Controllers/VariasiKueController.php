<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KueModel as Kue;
use App\Models\VariasiKueModel as Variasi;
use App\Http\Controllers\KueController as KueC;
class VariasiKueController extends Controller
{
    function postVariasiKue(Request $request)
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
     public function updateVariasiKue(Request $request, $KD_VARIASI)
{
    $validated = $request->validate([
        'ukuran_kue'   => 'sometimes|string|max:20',
        'harga_kue'    => 'sometimes|integer|min:0',
        'berat_bersih' => 'sometimes|numeric|min:0',
        'satuan_berat' => 'sometimes|in:gram,kg',
        'diameter_kue' => 'sometimes|nullable|numeric|min:0',
        'tinggi_kue'   => 'sometimes|nullable|numeric|min:0',
    ]);

    // gabungkan SETELAH validasi
    if (isset($validated['berat_bersih'], $validated['satuan_berat'])) {
        $validated['berat_bersih'] =
            $validated['berat_bersih'] . ' ' . $validated['satuan_berat'];

        unset($validated['satuan_berat']);
    }

    Variasi::findOrFail($KD_VARIASI)->update($validated);

    return back()
        ->with('success', 'Variasi kue berhasil diperbarui')
        ->with('active_tab', 'variasi_kue');
}

}
