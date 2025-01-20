@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>
    <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Pilih Kasir -->
        <div>
            <label for="Nama_Pembeli" class="block font-medium">Nama Pembeli:</label>
            <input type="text" name="Nama_Pembeli" id="Nama_Pembeli" class="border border-gray-300 rounded px-4 py-2 w-full" required>

        </div>

        <!-- Pilih Produk -->
        <div>
            <label for="produk_id" class="block font-medium">Pilih Produk:</label>
            <select name="produk_id" id="produk_id" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                <option value="">-- Pilih Produk --</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}"
                        {{ isset($selectedProduk) && $selectedProduk->id == $produk->id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }} - Rp{{ number_format($produk->harga, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Jumlah -->
        <div>
            <label for="jumlah" class="block font-medium">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" class="border border-gray-300 rounded px-4 py-2 w-full" required>
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label for="metode_pembayaran" class="block font-medium">Metode Pembayaran:</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="cash">Cash</option>
                <option value="cashless">Cashless</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>
@endsection
