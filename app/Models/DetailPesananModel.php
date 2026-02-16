<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananModel extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';
    public $timestamps = false;
    // public $incrementing = false; // Now using ID

    protected $fillable = [
        'KD_VARIASI',
        'NO_PESANAN',
        'jumlah_pesanan',
        'harga_saat_ini',
    ];

    // Relasi ke Pesanan 
    public function pesanan()
    {
        return $this->belongsTo(PesananModel::class, 'NO_PESANAN', 'NO_PESANAN');
    }

    // Relasi ke VariasiKue
    public function variasi_kue()
    {
        return $this->belongsTo(VariasiKueModel::class, 'KD_VARIASI', 'KD_VARIASI');
    }

    // Relasi ke Topping (many-to-many pivot)
    public function detail_topping()  
    {
        return $this->hasMany(
            DetailPesananToppingModel::class,
            'detail_pesanan_id', // Foreign key on detail_pesanan_topping table
            'id' // Local key on detail_pesanan table
        );
    }

    // Relasi ke  Rasa (many-to-many pivot)
    public function detail_rasa() 
    {
        return $this->hasMany(
            DetailPesananRasaModel::class, // Assuming this model exists or we use DB table
            'detail_pesanan_id',
            'id'
        );
    }
}
