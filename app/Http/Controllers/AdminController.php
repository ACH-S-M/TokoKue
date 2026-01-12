<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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
    function Logout() {
         Auth::guard('admin')->logout();
         return redirect()->route('admin.login');
    }
}
