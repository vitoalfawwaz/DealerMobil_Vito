<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitz CarAuto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
</head>
<body class="bg-gray-80">
    <nav class="bg-red-700 p-6">
        <div class="container mx-auto flex justify-between">
            <a href="/" class="text-white text-lg font-bold">Vitz CarAuto</a>
            <div class="space-x-6">
                <a href="{{ route('produk.index') }}" class="text-white hover:text-red-300">Produk</a>
                <a href="{{ route('transaksi.index') }}" class="text-white hover:text-red-300">Transaksi</a>
            </div>
        </div>
    </nav>

    
    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>
