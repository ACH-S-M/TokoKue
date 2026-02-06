<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VariasiKueModel as Variasi;

class KeranjangModel extends Model
{
    protected $table = "keranjang";
    protected $fillable = [
        'ID_PELANGGAN',
        'KD_VARIASI',
        'qty',
    ];
    public $timestamps = false;
    public function variasi_kue_keranjang(){
        return $this->Belongsto(Variasi::class,"KD_VARIASI","KD_VARIASI");
    }
    use HasFactory;
}
