@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <!-- Header -->
    <h1 class="text-4xl font-bold text-center text-red-600 mb-10">Detail Produk</h1>

    <!-- Card -->
    <div class="bg-white border border-red-300 shadow-xl rounded-lg overflow-hidden max-w-5xl mx-auto">
        <!-- Gambar Produk -->
        <div class="relative">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar {{ $produk->nama_produk }}" class="w-full h-96 object-cover">
            <div class="absolute top-4 left-4 bg-red-600 bg-opacity-80 text-white px-6 py-2 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold uppercase">{{ $produk->nama_produk }}</h2>
            </div>
        </div>

        <!-- Detail Produk -->
        <div class="p-8">
            <!-- Deskripsi -->
            <p class="text-lg text-gray-700 leading-relaxed mb-8 border-b border-red-300 pb-6">{{ $produk->deskripsi }}</p>

            <!-- Informasi Tambahan -->
            <div class="grid grid-cols-2 gap-8 mb-8">
                <p class="text-lg"><strong class="text-red-600">Kondisi:</strong> <span class="text-gray-800">{{ $produk->kondisi }}</span></p>
                <p class="text-lg"><strong class="text-red-600">Transmisi:</strong> <span class="text-gray-800">{{ $produk->transmisi }}</span></p>
                <p class="text-lg"><strong class="text-red-600">Bahan Bakar:</strong> <span class="text-gray-800">{{ $produk->bahan_bakar }}</span></p>
                <p class="text-lg"><strong class="text-red-600">Mesin:</strong> <span class="text-gray-800">{{ $produk->mesin }}</span></p>
                <p class="text-lg"><strong class="text-red-600">Tempat Duduk:</strong> <span class="text-gray-800">{{ $produk->tempat_duduk }}</span></p>
                <p class="text-lg"><strong class="text-red-600">Kecepatan Maksimal:</strong> <span class="text-gray-800">{{ $produk->kecepatan }} km/jam</span></p>
            </div>

            <!-- Harga -->
            <div class="text-center border-t border-red-300 pt-6">
                <p class="text-4xl font-bold text-red-600 mb-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="text-lg text-gray-500 line-through">Rp {{ number_format($produk->harga_cash, 0, ',', '.') }} (Cash)</p>
            </div>

            <!-- Tombol -->
            <div class="mt-8 flex justify-center">
                <a href="{{ route('produk.index') }}" class="bg-red-600 text-white text-lg px-8 py-3 rounded-lg shadow-lg hover:bg-red-700 transition duration-300">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
