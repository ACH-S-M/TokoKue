<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RasaModel extends Model
{
    protected $table = "rasa";
    protected $primaryKey = 'KD_RASA';
    protected $fillable = [
        'nama_rasa'
    ];
    public $timestamps = false;

    function variasi_kue_rasa(){
          return $this->belongsToMany(VariasiKueModel::class,'variasi_kue_rasa','KD_RASA','KD_VARIASI');
    }

    use HasFactory;
}
