<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KueModel as Kue;
use App\Models\VariasiKueModel as Variasi;
class VariasiKueController extends Controller
{
    function indexVariasiKue()
    {
        $kues = Kue::all();
        $variasikues = Variasi::all();
        $getKue = null;
        return view("admin.Layouts.variasiproduk", compact('kues', 'variasikues','getKue'));
    }
}
