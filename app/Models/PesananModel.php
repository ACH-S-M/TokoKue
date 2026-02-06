<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    protected $table = "pesanan";
    protected $fillable = [
        "NO_PESANAN",
        "ID_PELANGGAN",
        "total_harga",
        "catatan"
    ];

    use HasFactory;

}
