<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KueModel as Kue;
use App\Models\DetailPesananModel as DetailPesanan;
use App\Models\DetailPesananToppingModel;
use App\Models\PesananModel as Pesanan;

class AdminController extends Controller
{
    function Index(){
        $dataProduk = Kue::count();
        return view('admin.Layouts.dashboard',compact('dataProduk'));
    }
    function Login(Request $request) {
       $validate = $this->validate($request, [
            "email"=> "required|email",
            "password"=> "required",
        ]);

    if (Auth::guard('admin')->attempt([
            'email' => $validate['email'],
            'password' => $validate['password']
        ])) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }
        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    //Fungsi untuk menampilkan Halaman Pesanan di admin bar 

    function PesananIndex(){
        // Eager load pesanan and detail_pesanan, but handle toppings manually due to composite key
        $detail_pesanan = Pesanan::with(['pelanggan','detail_pesanan.variasi_kue.kue'])->orderBy('NO_PESANAN','desc')->paginate(10);
        
        // Cuma ambil nomor pesanan aja
        $allOrderNumbers = $detail_pesanan->pluck('NO_PESANAN')->unique();
        
        if ($allOrderNumbers->isNotEmpty()) {
            $allToppings = DetailPesananToppingModel::with('topping')
                ->whereIn('NO_PESANAN', $allOrderNumbers)
                ->get()
                ->groupBy(function($item) {
                    return $item->NO_PESANAN . '-' . $item->KD_VARIASI;
                });
                
            foreach ($detail_pesanan as $pesanan) {
                if ($pesanan->detail_pesanan) {
                    foreach ($pesanan->detail_pesanan as $detail) {
                        $key = $detail->NO_PESANAN . '-' . $detail->KD_VARIASI;
                        $detail->setRelation('detail_topping', $allToppings->get($key, collect()));
                    }
                }
            }
        }
        
        return view('admin.Layouts.pesanan',compact('detail_pesanan'));
    }

    function Logout() {
         Auth::guard('admin')->logout();
         return redirect()->route('admin.login');
    }
}
