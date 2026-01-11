<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PelangganModel as Pelanggan;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function Register(Request $request)
    {
        $validate = $request->validate([
            'nama_pelanggan' => [
                'required',
                'string',
                'min:3',
                'max:100'
            ],
            'email_pelanggan' => [
                'required',
                'email',
                'max:100',
                'unique:pelanggan,email_pelanggan'
            ],
            'password_pelanggan' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/'
            ],
            'telepon_pelanggan' => [
                'required',
                'numeric',
                'digits_between:10,15'
            ],
            'alamat_pelanggan' => [
                'required',
                'string',
                'min:10'
            ],
        ]);

        $user = Pelanggan::create([
            'nama_pelanggan' => $validate['nama_pelanggan'],
            'email_pelanggan' => $validate['email_pelanggan'],
            'alamat_pelanggan' => $validate['alamat_pelanggan'],
            'telepon_pelanggan' => $validate['telepon_pelanggan'],
            'password_pelanggan' => Hash::make($validate['password_pelanggan']),
        ]);
        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }
    function Login(Request $request){
        dd($request->all());
    }
}
