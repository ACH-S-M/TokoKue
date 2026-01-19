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
        'KD_KUE',
        'harga_kue',
        'ukuran_kue',
        'toping_kue',
    ];
    public $timestamps = false;

    public function Kue(){
        return $this->belongsTo(Kue::class,'KD_KUE','KD_KUE');
    }

    use HasFactory;


}
