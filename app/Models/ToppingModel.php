<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToppingModel extends Model
{
    protected $table = "topping";
    protected $fillable = [
        "nama_topping",
        "biaya_tambahan",
    ];
    protected $primaryKey = 'KD_TOPPING';
    public $timestamps = false;
    use HasFactory;
}
