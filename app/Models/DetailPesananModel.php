<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananModel extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';
    public $timestamps = false;
    public $incrementing = false;

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
    public function detail_topping()  //ini diubah tadinya topping() jadi ke detail_topping
    {
        return $this->hasMany(
            DetailPesananToppingModel::class,
            'NO_PESANAN',
            localKey: 'NO_PESANAN'
        )->where('KD_VARIASI', $this->KD_VARIASI);
    }

    // Relasi ke  Rasa (many-to-many pivot)
    public function detail_rasa() //ini diubah tadinya rasa() jadi ke detail_rasa()
    {
        return $this->belongsToMany(
            RasaModel::class,
            'detail_pesanan_rasa',
            'NO_PESANAN',
            'KD_RASA'
        )->wherePivot('KD_VARIASI', $this->KD_VARIASI);
    }
}
