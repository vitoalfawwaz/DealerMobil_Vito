<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            @page {
                margin: 10mm;
            }
            body {
                margin: 0;
                font-size: 12px;
                font-family: 'Arial', sans-serif;
            }
            h1 {
                font-size: 18px;
            }
            .container {
                padding: 15px;
            }
            .text-lg {
                font-size: 14px;
            }
            .text-sm {
                font-size: 12px;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container max-w-3xl mx-auto bg-white shadow-xl rounded-lg border border-gray-200 p-6 mt-12">
        <!-- Header -->
        <div class="text-center border-b border-gray-200 pb-6 mb-6">
            <h1 class="text-3xl font-bold text-blue-600">Detail Transaksi</h1>
            <p class="text-xs text-gray-600">Tersimpan dalam sistem | {{ now()->format('d M Y, H:i') }}</p>
        </div>

        <!-- Detail Transaksi -->
        <div class="space-y-6">
            <!-- Nama Pembeli -->
            <div>
                <p class="text-lg font-semibold text-gray-700">Nama Pembeli</p>
                <p class="text-sm text-gray-800">{{ $transaksi->Nama_Pembeli ?? 'Tidak Diketahui' }}</p>
            </div>

            <!-- Produk -->
            <div>
                <p class="text-lg font-semibold text-gray-700">Produk</p>
                <div class="flex items-center mt-2 bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                    <img src="{{ asset('storage/' . $transaksi->produk->gambar) }}"
                         alt="{{ $transaksi->produk->nama_produk }}"
                         class="w-24 h-24 object-cover rounded-lg border border-gray-300">
                    <div class="ml-6 space-y-2">
                        <p class="text-sm"><span class="font-semibold">Nama Produk:</span> {{ $transaksi->produk->nama_produk }}</p>
                        <p class="text-sm"><span class="font-semibold">Harga:</span> Rp {{ number_format($transaksi->produk->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Jumlah dan Subtotal -->
            <div>
                <p class="text-lg font-semibold text-gray-700">Rincian Transaksi</p>
                <div class="space-y-1">
                    <p class="text-sm"><span class="font-semibold">Jumlah:</span> {{ $transaksi->jumlah }}</p>
                    <p class="text-sm"><span class="font-semibold">Sub Total:</span> Rp {{ number_format($transaksi->produk->harga * $transaksi->jumlah, 0, ',', '.') }}</p>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div>
                <p class="text-lg font-semibold text-gray-700">Metode Pembayaran</p>
                <p class="text-sm text-gray-800">{{ ucfirst($transaksi->metode_pembayaran) }}</p>
            </div>

            <!-- Total Harga -->
            <div>
                <p class="text-lg font-semibold text-gray-700">Total Harga</p>
                <p class="text-sm text-gray-800">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            </div>

            <!-- Tanggal Transaksi -->
            <div>
                <p class="text-lg font-semibold text-gray-700">Tanggal Transaksi</p>
                <p class="text-sm text-gray-800">{{ $transaksi->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 border-t border-gray-200 pt-6 text-center">
            <p class="text-gray-600 text-sm">Terima kasih atas transaksi Anda!</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
