@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-center mb-6">Detail Transaksi</h1>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- Kasir -->
        <p><strong>Nama Pembeli:</strong> {{ $transaksi->Nama_Pembeli ?? 'Tidak Diketahui' }}</p>

        <!-- Produk -->
        <div class="mt-4">
            <h3 class="text-lg font-semibold">Produk:</h3>
            <div class="flex items-center">
                <img src="{{ asset('storage/' . $transaksi->produk->gambar) }}" alt="{{ $transaksi->produk->nama_produk }}" class="w-20 h-20 object-cover rounded-md mr-4">
                <div>
                    <p><strong>Nama Produk:</strong> {{ $transaksi->produk->nama_produk }}</p>
                    <p><strong>Harga:</strong> Rp {{ number_format($transaksi->produk->harga, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Jumlah dan Subtotal -->
        <div class="mt-4">
            <p><strong>Jumlah:</strong> {{ $transaksi->jumlah }}</p>
            <p><strong>Sub Total:</strong> Rp {{ number_format($transaksi->produk->harga * $transaksi->jumlah, 0, ',', '.') }}</p>
        </div>

        <!-- Metode Pembayaran -->
        <p class="mt-4"><strong>Metode Pembayaran:</strong> {{ ucfirst($transaksi->metode_pembayaran) }}</p>

        <!-- Total Harga -->
        <p class="mt-4"><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>

        <!-- Tanggal Transaksi -->
        <p class="mt-4"><strong>Tanggal Transaksi:</strong> {{ $transaksi->created_at->format('d M Y, H:i') }}</p>
    </div>

    <a href="{{ route('transaksi.print', $transaksi->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4 inline-block">Cetak</a>

    <a href="{{ route('transaksi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mt-4 inline-block">Kembali</a>
</div>
@endsection
