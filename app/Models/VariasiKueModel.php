<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KueModel as Kue;
use App\Models\RasaModel as Rasa;
use App\Models\ToppingModel as Topping;
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
    ];
    public $timestamps = false;

    public function kue(){
        return $this->belongsTo(Kue::class,'KD_KUE','KD_KUE');
    }
    public function rasa(){
        return $this->belongsToMany(Rasa::class,'variasi_kue_rasa','KD_VARIASI','KD_RASA');
    }
    public function topping(){
        return $this->belongsToMany(Topping::class,'variasi_kue_topping','KD_VARIASI','KD_TOPPING');
    }


    use HasFactory;


}
