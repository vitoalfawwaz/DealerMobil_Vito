<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk',
    'deskripsi',
    'harga',
    'stok',
    'gambar',
    'kondisi',
    'transmisi',
    'bahan_bakar',
    'mesin',
    'tempat_duduk',
    'kecepatan'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }


 /**
     * Accessor untuk mendapatkan URL gambar.
     *
     * Jika path gambar ada di dalam folder `public/images`, accessor ini
     * akan mengembalikan URL lengkap gambar tersebut.
     */
    public function getGambarUrlAttribute()
    {
        return asset($this->gambar);
    }
}
