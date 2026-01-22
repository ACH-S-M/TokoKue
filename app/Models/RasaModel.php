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

    function variasi_kue(){
        return $this->belongsTo(RasaModel::class,'KD_RASA','KD_RASA');
    }

    use HasFactory;
}
