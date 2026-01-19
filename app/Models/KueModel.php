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
    ];
    public $timestamps = false;

    function variasi_kue(){
         return $this->hasMany(Variasi::class,"KD_KUE","KD_KUE");
     }
    use HasFactory;

}
