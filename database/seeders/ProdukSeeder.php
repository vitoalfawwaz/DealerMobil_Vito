<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $produk = new Produk();
        $produk->nama_produk = 'Toyota Rush';
        $produk->deskripsi = 'SUV Modern';
        $produk->kilometer = 72000;
        $produk->lokasi = 'Jakarta';
        $produk->harga = 204000000;
        $produk->harga_cash = 210000000;
        $produk->gambar = '/images/toyota-rush.jpg'; // Path gambar
        $produk->save();
    }
}
