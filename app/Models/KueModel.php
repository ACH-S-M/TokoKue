<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VariasiKueModel as Variasi;
class KueModel extends Model
{
    protected $table = "kue";
    protected $primaryKey = 'KD_KUE';
    protected $fillable = [
        "nama_kue",
        "gambar_kue",
        "deskripsi_kue",
        "stok",
    ];
    public $timestamps = false;

   
    use HasFactory;

}
