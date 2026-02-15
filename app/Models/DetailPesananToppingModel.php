<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesananToppingModel extends Model
{
    protected $table = "detail_pesanan_topping";

    public $timestamps = false;

    public function ke_topping(){
            return $this->belongsTo(ToppingModel::class,"KD_TOPPING","KD_TOPPING");
    }

    public function topping(){
        return $this->belongsTo(ToppingModel::class,"KD_TOPPING","KD_TOPPING");
    }
    use HasFactory;
}
