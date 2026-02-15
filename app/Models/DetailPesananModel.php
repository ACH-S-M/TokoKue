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

    // Relation to Pesanan
    public function pesanan()
    {
        return $this->belongsTo(PesananModel::class, 'NO_PESANAN', 'NO_PESANAN');
    }

    // Relation to VariasiKue
    public function variasi_kue()
    {
        return $this->belongsTo(VariasiKueModel::class, 'KD_VARIASI', 'KD_VARIASI');
    }

    // Relation to Topping (many-to-many through pivot)
    public function topping()
    {
        return $this->belongsToMany(
            ToppingModel::class,
            'detail_pesanan_topping',
            'NO_PESANAN',
            'KD_TOPPING'
        )->wherePivot('KD_VARIASI', $this->KD_VARIASI);
    }

    // Relation to Rasa (many-to-many through pivot)
    public function rasa()
    {
        return $this->belongsToMany(
            RasaModel::class,
            'detail_pesanan_rasa',
            'NO_PESANAN',
            'KD_RASA'
        )->wherePivot('KD_VARIASI', $this->KD_VARIASI);
    }
}
