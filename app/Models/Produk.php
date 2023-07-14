<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produk';
    
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'id_kategori',
        'id_user',
        'varietas_produk',
        'panen_usia',
        'bobot_rata_rata',
        'ks_ruangan',
        'ks_kulkas',
        'pestisida',
        'deskripsi_produk',
        'kapasitas_produksi',
        'opsi_pengiriman',
        'photo_produk_1',
        'photo_produk_2',
        'photo_produk_3',
    ];

    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
}
