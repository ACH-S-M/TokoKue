<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KueModel as Kue;
class VariasiKueModel extends Model
{
    protected $primaryKey = 'KD_VARIASI';
    protected $table = 'variasi_kue';
    protected $fillable = [
        'KD_VARIASI',
        'KD_KUE',
        'harga_kue',
        'ukuran_kue',
        'tinggi_kue',
        'diameter_kue',
        'berat_bersih',
        'KD_RASA',
        'KD_TOPPING',
        'toping_kue',
    ];
    public $timestamps = false;

    public function Kue(){
        return $this->belongsTo(Kue::class,'KD_KUE','KD_KUE');
    }
    public function rasa(){
        return $this->belongsToMany(RasaModel::class,'variasi_kue_rasa','KD_VARIASI','KD_RASA');
    }
    use HasFactory;


}
