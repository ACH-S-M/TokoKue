<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VariasiKueModel as Variasi;

class ToppingModel extends Model
{
    protected $table = "topping";
    protected $fillable = [
        "nama_topping",
        "biaya_tambahan",
    ];
    protected $primaryKey = 'KD_TOPPING';
    public $timestamps = false;

    public function variasiKue(){
        return $this->belongsToMany(Variasi::class,'variasi_kue_topping','KD_TOPPING','KD_VARIASI');
    }
    use HasFactory;
}
