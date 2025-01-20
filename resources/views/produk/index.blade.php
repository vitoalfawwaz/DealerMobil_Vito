@extends('layouts.app')

@section('content')
<!-- Carousel Section -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide flex justify-center items-center bg-gray-200">
            <img src="{{ asset('storage/images/slide1.jpg') }}" alt="Mobil Slide 1" class="w-full h-[500px] sm:h-[600px] md:h-[700px] lg:h-[750px] object-cover rounded-xl shadow-lg">
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide flex justify-center items-center bg-gray-200">
            <img src="{{ asset('storage/images/slide2.jpg') }}" alt="Mobil Slide 2" class="w-full h-[500px] sm:h-[600px] md:h-[700px] lg:h-[750px] object-cover rounded-xl shadow-lg">
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide flex justify-center items-center bg-gray-200">
            <img src="{{ asset('storage/images/slide3.jpg') }}" alt="Mobil Slide 3" class="w-full h-[500px] sm:h-[600px] md:h-[700px] lg:h-[750px] object-cover rounded-xl shadow-lg">
        </div>
    </div>
    <!-- Navigation -->
    <div class="swiper-button-next text-white bg-black p-2 rounded-full shadow-md hover:bg-red-600"></div>
    <div class="swiper-button-prev text-white bg-black p-2 rounded-full shadow-md hover:bg-red-600"></div>
</div>

<!-- Daftar Produk Section -->
<div class="bg-red-600 py-6">
    <div class="container mx-auto px-6 text-white text-center">
        <h1 class="text-4xl font-bold mb-4">Daftar Produk Mobil</h1>
        <p class="text-lg text-white opacity-80">Temukan berbagai pilihan mobil yang sesuai dengan kebutuhan Anda.</p>
    </div>
</div>

<!-- Produk Cards Section -->
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($produks as $produk)
        <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Mobil {{ $produk->nama_produk }}" class="w-full h-56 object-cover rounded-t-lg">
            <div class="p-4">
                <h2 class="text-xl font-semibold text-gray-800">{{ $produk->nama_produk }}</h2>
                <p class="text-sm text-gray-500 mb-3">{{ $produk->deskripsi }}</p>
                <p class="text-sm text-gray-700">Stok: {{ $produk->stok }}</p>
                <p class="text-lg font-bold text-red-600 mt-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            </div>
            <div class="p-4 bg-gray-50 flex justify-between items-center">
                <a href="{{ route('produk.show', $produk->id) }}" class="text-red-600 hover:underline transition">Detail</a>
                <a href="{{ route('transaksi.create', ['produk_id' => $produk->id]) }}" class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition">
                    Beli Sekarang
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Tombol Tambah Produk -->
<div class="mb-6 flex justify-end container mx-auto px-4">
    <a href="{{ route('produk.create') }}" class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition">
        Tambah Produk
    </a>
</div>
@endsection
