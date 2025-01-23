@extends('layouts.app')

@section('content')
<!-- Include Swiper.js Styles -->
<link
  rel="stylesheet"
  href="https://unpkg.com/swiper/swiper-bundle.min.css"
/>

<!-- Carousel Section -->
<div class="swiper-container mb-8">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide">
            <img src="{{ asset('storage/images/slide1.jpg') }}" alt="Mobil Slide 1"
                 class="w-full h-[500px] sm:h-[600px] md:h-[700px] lg:h-[750px] object-cover rounded-xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out">
        </div>
        <!-- Slide 2 -->
        <div class="swiper-slide">
            <img src="{{ asset('storage/images/slide2.jpg') }}" alt="Mobil Slide 2"
                 class="w-full h-[500px] sm:h-[600px] md:h-[700px] lg:h-[750px] object-cover rounded-xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out">
        </div>
        <!-- Slide 3 -->
        <div class="swiper-slide">
            <img src="{{ asset('storage/images/slide3.jpg') }}" alt="Mobil Slide 3"
                 class="w-full h-[500px] sm:h-[600px] md:h-[700px] lg:h-[750px] object-cover rounded-xl shadow-xl hover:shadow-2xl transition duration-500 ease-in-out">
        </div>
    </div>
    <!-- Navigation buttons -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <!-- Pagination -->
    <div class="swiper-pagination"></div>
</div>

<!-- Include Swiper.js Script -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        loop: true, // Enable continuous looping
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000, // Delay between slides in ms
            disableOnInteraction: false,
        },
    });
</script>

<!-- Daftar Produk Section -->
<div class="bg-red-600 py-12">
    <div class="container mx-auto px-6 text-white text-center">
        <h1 class="text-5xl font-bold mb-6">Daftar Produk Mobil</h1>
        <p class="text-xl text-white opacity-80 mb-6">Temukan berbagai pilihan mobil yang sesuai dengan kebutuhan Anda.</p>
    </div>
</div>

<!-- Produk Cards Section -->
<div class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($produks as $produk)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 ease-in-out">
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Mobil {{ $produk->nama_produk }}"
                     class="w-full h-56 sm:h-64 object-cover rounded-t-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $produk->nama_produk }}</h2>
                    <p class="text-sm text-gray-500 mb-3">{{ $produk->deskripsi }}</p>
                    <p class="text-sm text-gray-700">Stok: {{ $produk->stok }}</p>
                    <p class="text-lg font-bold text-red-600 mt-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                </div>
                <div class="p-4 bg-gray-50 flex justify-between items-center">
                    <a href="{{ route('produk.show', $produk->id) }}"
                       class="text-red-600 hover:underline transition duration-200 ease-in">Detail</a>
                    <a href="{{ route('transaksi.create', ['produk_id' => $produk->id]) }}"
                       class="bg-red-600 text-white px-6 py-3 rounded-full hover:bg-red-700 transition duration-300 ease-in-out">
                       Beli Sekarang
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Tombol Tambah Produk -->
<div class="mb-6 flex justify-end container mx-auto px-6">
    <a href="{{ route('produk.create') }}"
       class="bg-red-700 text-white px-6 py-3 rounded-full hover:bg-green-700 transition duration-300 ease-in-out">
        Tambah Produk
    </a>
</div>

<!-- Footer -->
<footer class="bg-red-700 py-8 text-center text-white">
    <p class="text-lg">
        Vitz CarAuto merupakan portal e-commerce mobil yang terintegrasi dan terbesar di Asia Tenggara.
        Hadir di Malaysia, Indonesia, Thailand, dan Singapura. <br>
        © 2016-2025 PT VITZ CARAUTO INDONESIA. Dilindungi oleh hak cipta.
    </p>
</footer>

@endsection
