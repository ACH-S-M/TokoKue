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
        $keranjang = Keranjang::with(['variasi_kue_keranjang.kue', 'topping', 'rasa'])
            ->where('ID_PELANGGAN', '=', $idUser)
            ->get();
        return view("pelanggan.Layouts.keranjang", compact(['keranjang']));
    }
    // Store Ke keranjang
    function store($KD_PRODUK, Request $request)
    {
        $idPelanggan = auth('pelanggan')->user()->ID_PELANGGAN;

        // Validasi input
        $request->validate([
            'KD_VARIASI' => 'required|exists:variasi_kue,KD_VARIASI',
            'toppings' => 'nullable|array',
            'toppings.*' => 'exists:topping,KD_TOPPING',
            'rasa' => 'nullable|array',
            'rasa.*' => 'exists:rasa,KD_RASA',
        ]);

        $kdVariasi = $request->KD_VARIASI;
        $selectedToppings = $request->toppings ?? [];

        $selectedRasa = $request->rasa ?? [];

        // Ambil variasi dengan relasi topping dan rasa yang tersedia
        $variasi = Variasi::with(['topping', 'rasa'])->findOrFail($kdVariasi);

        // Validasi: topping yang dipilih harus tersedia untuk variasi ini
        $availableToppingIds = $variasi->topping->pluck('KD_TOPPING')->toArray();
        foreach ($selectedToppings as $toppingId) {
            if (!in_array($toppingId, $availableToppingIds)) {
                return redirect()->back()->withErrors(['error' => 'Topping tidak tersedia untuk variasi ini']);
            }
        }

        // Validasi: rasa yang dipilih harus tersedia untuk variasi ini
        $availableRasaIds = $variasi->rasa->pluck('KD_RASA')->toArray();
        foreach ($selectedRasa as $rasaId) {
            if (!in_array($rasaId, $availableRasaIds)) {
                return redirect()->back()->withErrors(['error' => 'Rasa tidak tersedia untuk variasi ini']);
            }
        }

        $keranjang = Keranjang::where('ID_PELANGGAN', $idPelanggan)
            ->where('KD_VARIASI', $kdVariasi)
            // semua topping harus match
            ->whereHas('topping', function ($q) use ($selectedToppings) {
                $q->whereIn('topping.KD_TOPPING', $selectedToppings);
            }, '=', count($selectedToppings))
            // semua rasa harus match
            ->whereHas('rasa', function ($q) use ($selectedRasa) {
                $q->whereIn('rasa.KD_RASA', $selectedRasa);
            }, '=', count($selectedRasa))
            ->first();


        try {
            if (
                $keranjang &&
                $keranjang->topping->count() == count($selectedToppings) &&
                $keranjang->rasa->count() == count($selectedRasa)
            ) {
                // Item dengan topping & rasa yang sama sudah ada → tambah qty
                $keranjang->increment('qty');
                $keranjangId = $keranjang->id;
            } else {
                // Buat item baru
                $newKeranjang = Keranjang::create([
                    'ID_PELANGGAN' => $idPelanggan,
                    'KD_VARIASI'   => $kdVariasi,
                    'qty'          => 1
                ]);
                $keranjangId = $newKeranjang->id;

                // Attach topping yang dipilih
                if (!empty($selectedToppings)) {
                    $newKeranjang->topping()->attach($selectedToppings);
                }

                // Attach rasa yang dipilih
                if (!empty($selectedRasa)) {
                    $newKeranjang->rasa()->attach($selectedRasa);
                }
            }

            return redirect()->route('Keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
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
            return redirect()->back()->with('success', 'item berhasil dihapus dari keranjang');
        } else {
            $item->update(['qty' => $newQty]);
            return redirect()->back()->with('success');
        }
    }
    public function Delete($KD_VARIASI)
    {
        $item = Keranjang::where('ID_PELANGGAN', auth('pelanggan')->user()->ID_PELANGGAN)
            ->where('KD_VARIASI', $KD_VARIASI)->firstOrFail();
        $item->delete();
        return redirect()->back();
    }
}
