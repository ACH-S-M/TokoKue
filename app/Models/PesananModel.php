<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    use HasFactory;

    protected $table = "pesanan";
    protected $primaryKey = "NO_PESANAN";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        "NO_PESANAN",
        "ID_PELANGGAN",
        "nama_penerima",
        "alamat_spesifik",
        "kota",
        "provinsi",
        "kode_pos",
        "total_harga",
        "catatan",
    ];

    // Relasi Ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'ID_PELANGGAN', 'ID_PELANGGAN');
    }

    

    // Relasi ke detail Pesanan / Many to many
    public function detail_pesanan()
    {
        return $this->hasMany(DetailPesananModel::class, 'NO_PESANAN', 'NO_PESANAN');
    }


    // Generate nomor Uniq sesuai tanggal contoh : ORD-20261202-001 
    public static function generateOrderNumber()
    {
        $date = date('Ymd');
        $lastOrder = self::where('NO_PESANAN', 'LIKE', "ORD-{$date}-%")
            ->orderBy('NO_PESANAN', 'desc')
            ->first();
        
        if ($lastOrder) {
            $lastNumber = (int) substr($lastOrder->NO_PESANAN, -4);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }
        
        return "ORD-{$date}-{$newNumber}";
    }
}
