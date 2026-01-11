<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PelangganModel extends Authenticatable
{
    protected $table = 'pelanggan';
    public $timestamps = false;
    protected $fillable = [
        'nama_pelanggan',
        'email_pelanggan',
        'alamat_pelanggan',
        'telepon_pelanggan',
        'password',
    ];
    
    protected $hidden = [
        'password'
    ];
    public function getAuthIdentifierName()
{
    return 'email_pelanggan';
}


    use HasFactory;


}
