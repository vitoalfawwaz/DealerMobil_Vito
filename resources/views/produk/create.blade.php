@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Tambah Produk Baru</h1>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="nama_produk" class="block text-gray-700 font-bold">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-bold">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label for="harga" class="block text-gray-700 font-bold">Harga</label>
            <input type="number" name="harga" id="harga" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="stok" class="block text-gray-700 font-bold">Stok</label>
            <input type="number" name="stok" id="stok" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="kondisi" class="block text-gray-700 font-bold">Kondisi</label>
            <input type="text" name="kondisi" id="kondisi" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="transmisi" class="block text-gray-700 font-bold">Transmisi</label>
            <input type="text" name="transmisi" id="transmisi" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="bahan_bakar" class="block text-gray-700 font-bold">Bahan Bakar</label>
            <input type="text" name="bahan_bakar" id="bahan_bakar" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="mesin" class="block text-gray-700 font-bold">Mesin</label>
            <input type="text" name="mesin" id="mesin" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="tempat_duduk" class="block text-gray-700 font-bold">Tempat Duduk</label>
            <input type="number" name="tempat_duduk" id="tempat_duduk" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="kecepatan" class="block text-gray-700 font-bold">Kecepatan</label>
            <input type="text" name="kecepatan" id="kecepatan" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="gambar" class="block text-gray-700 font-bold">Gambar Produk</label>
            <input type="file" name="gambar" id="gambar" class="w-full border rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Produk</button>
    </form>
</div>
@endsection
