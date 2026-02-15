<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeranjangModel as Keranjang;
use App\Models\PesananModel as Pesanan;
use App\Models\DetailPesananModel as DetailPesanan;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class pesananController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }
    //Index dimana ini buat menampilkan form pesanan seperti nama penerima, alamat dll 
    function Index()
    {
        $user = auth()->guard("pelanggan")->user()->ID_PELANGGAN;
        $keranjang = Keranjang::with(['variasi_kue_keranjang.kue', 'topping', 'rasa'])
            ->where("ID_PELANGGAN", "=", $user)
            ->get();
        
        // Calculate grand total
        $grandTotal = $keranjang->sum(function ($item) {
            $basePrice = $item->variasi_kue_keranjang->harga_kue;
            $toppingPrice = $item->topping->sum('biaya_tambahan');
            return ($basePrice + $toppingPrice) * $item->qty;
        });

        return view("pelanggan.Layouts.checkout", compact("keranjang", "grandTotal"));
    }

    function Checkout(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_penerima' => 'required|string|max:255',
            'alamat_spesifik' => 'required|string',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'catatan' => 'nullable|string',
        ]);

        $user = auth()->guard("pelanggan")->user();
      
        $idPelanggan = $user->ID_PELANGGAN;

        // Ambil item di keranjang 
        $keranjang = Keranjang::with(['variasi_kue_keranjang.kue', 'topping', 'rasa'])
            ->where("ID_PELANGGAN", "=", $idPelanggan)
            ->get();
        if ($keranjang->isEmpty()) {
            return redirect()->route('Keranjang')->withErrors(['error' => 'Keranjang kosong']);
        }
        
        DB::beginTransaction();
       
        try {
            // Generate nomor order sesuai yang udah dibuat di Model
            $noPesanan = Pesanan::generateOrderNumber();

            // Hitung harga total (Penggunaan topping jika ada )
            $totalHarga = $keranjang->sum(function ($item) {
                $basePrice = $item->variasi_kue_keranjang->harga_kue; //harga awal = harga kue yang diambil dari harga saat dibeli, bukan harga langsung 
                $toppingPrice = $item->topping->sum('biaya_tambahan'); //jumlah semua topping tambahan jika ada 
                return ($basePrice + $toppingPrice) * $item->qty; //totalharga = harga awal + harga topping
            });
           

            // Buat order pesanan, disini masih error
            $pesanan = Pesanan::create([
                'NO_PESANAN' => $noPesanan,
                'ID_PELANGGAN' => $idPelanggan,
                'nama_penerima' => $validated['nama_penerima'],
                'alamat_spesifik' => $validated['alamat_spesifik'],
                'kota' => $validated['kota'],
                'provinsi' => $validated['provinsi'],
                'kode_pos' => $validated['kode_pos'],
                'total_harga' => $totalHarga,
                'catatan' => $validated['catatan'],
            ]);
        
            // Buat detail order dari masing masing yg dibeli 
            foreach ($keranjang as $item) {
                $basePrice = $item->variasi_kue_keranjang->harga_kue;
                $toppingPrice = $item->topping->sum('biaya_tambahan');
                $hargaSaatIni = $basePrice + $toppingPrice;
                // Create detail pesanan
                DetailPesanan::create([
                    'NO_PESANAN' => $noPesanan,
                    'KD_VARIASI' => $item->KD_VARIASI,
                    'jumlah_pesanan' => $item->qty,
                    'harga_saat_ini' => $hargaSaatIni,
                ]);
                  
                // Save selected toppings to pivot table
                if ($item->topping->count() > 0) {
                    foreach ($item->topping as $topping) {
                        DB::table('detail_pesanan_topping')->insert([
                            'NO_PESANAN' => $noPesanan,
                            'KD_VARIASI' => $item->KD_VARIASI,
                            'KD_TOPPING' => $topping->KD_TOPPING,
                        ]);
                    }
                }

                // Save selected rasa to pivot table
                if ($item->rasa->count() > 0) {
                    foreach ($item->rasa as $rasa) {
                        DB::table('detail_pesanan_rasa')->insert([
                            'NO_PESANAN' => $noPesanan,
                            'KD_VARIASI' => $item->KD_VARIASI,
                            'KD_RASA' => $rasa->KD_RASA,
                        ]);
                    }
                }
            }

            // Prepare Midtrans transaction details
            $transactionDetails = [
                'order_id' => $noPesanan,
                'gross_amount' => $totalHarga,
            ];

            // Prepare item details for Midtrans
            $itemDetails = [];
            foreach ($keranjang as $item) {
                $basePrice = $item->variasi_kue_keranjang->harga_kue;
                $toppingPrice = $item->topping->sum('biaya_tambahan');
                $itemPrice = $basePrice + $toppingPrice;

                $itemName = $item->variasi_kue_keranjang->kue->nama_kue . ' (' . $item->variasi_kue_keranjang->ukuran_kue . ')';
                
                if ($item->topping->count() > 0) {
                    $toppingNames = $item->topping->pluck('nama_topping')->implode(', ');
                    $itemName .= ' + ' . $toppingNames;
                }

                $itemDetails[] = [
                    'id' => $item->KD_VARIASI,
                    'price' => $itemPrice,
                    'quantity' => $item->qty,
                    'name' => $itemName,
                ];
            }
            // Detail pelanggan ada disini 
            $customerDetails = [
                'first_name' => $validated['nama_penerima'],
                'email' => $user->email_pelanggan ?? 'customer@tokokue.com',
                'phone' => $user->telepon_pelanggan ?? '00',
                'shipping_address' => [
                    'address' => $validated['alamat_spesifik'],
                    'city' => $validated['kota'],
                    'postal_code' => $validated['kode_pos'],
                ],
            ];

            // Midtrans transaction parameters
            $params = [
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails,
            ];
     

            // Get Snap token
            $snapToken = Snap::getSnapToken($params);

            // Clear cart after order created
            Keranjang::where('ID_PELANGGAN', $idPelanggan)->delete();

            DB::commit();

            // Return view with snap token
            return view('pelanggan.Layouts.payment', compact('snapToken', 'pesanan'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function callback(Request $request)
    {
        try {
            // Create notification instance
            $notification = new Notification();

            $transactionStatus = $notification->transaction_status;
            $orderId = $notification->order_id;
            $fraudStatus = $notification->fraud_status;
            $paymentType = $notification->payment_type;
            $transactionId = $notification->transaction_id;

            // Find order
            $pesanan = Pesanan::where('midtrans_order_id', $orderId)->first();

            if (!$pesanan) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Update order based on transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $pesanan->status = 'diproses';
                }
            } elseif ($transactionStatus == 'settlement') {
                $pesanan->status = 'diproses';
            } elseif ($transactionStatus == 'pending') {
                $pesanan->status = 'belum_dibayar';
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                $pesanan->status = 'dibatalkan';
            }

            // Save transaction details
            $pesanan->midtrans_transaction_id = $transactionId;
            $pesanan->payment_type = $paymentType;
            $pesanan->save();

            return response()->json(['message' => 'Callback processed successfully']);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
