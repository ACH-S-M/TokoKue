<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananRasaModel extends Model
{
    use HasFactory;

    protected $table = "detail_pesanan_rasa";
    public $timestamps = false;

    protected $fillable = [
        'detail_pesanan_id',
        'NO_PESANAN',
        'KD_VARIASI',
        'KD_RASA'
    ];

    public function rasa()
    {
        return $this->belongsTo(RasaModel::class, "KD_RASA", "KD_RASA");
    }
}
