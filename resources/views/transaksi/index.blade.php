@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>
    <div class="flex justify-between items-center mb-4">
        <!-- Tombol Tambah -->
        <a href="{{ route('transaksi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Transaksi</a>

        <!-- Form Pencarian -->
        <form action="{{ route('transaksi.index') }}" method="GET" class="flex items-center">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari transaksi..."
                class="border border-gray-300 rounded px-4 py-2 mr-2"
            />
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Cari
            </button>
        </form>
    </div>

    <!-- Tabel Transaksi -->
    <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="border px-4 py-2">#</th>
                <th class="border px-4 py-2">Kasir</th>
                <th class="border px-4 py-2">Produk</th>
                <th class="border px-4 py-2">Jumlah</th>
                <th class="border px-4 py-2">Total Harga</th>
                <th class="border px-4 py-2">Metode Pembayaran</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transaksis as $transaksi)
                <tr>
                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-4 py-2">{{ $transaksi->Nama_Pembeli }}</td>
                    <td class="border px-4 py-2">{{ $transaksi->produk->nama_produk }}</td>
                    <td class="border px-4 py-2">{{ $transaksi->jumlah }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($transaksi->total_harga, 2, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($transaksi->metode_pembayaran) }}</td> <!-- Tambahan -->
                    <td class="border px-4 py-2">
                        <!-- Tombol Hapus dengan Modal -->
                        <button
                            onclick="confirmDelete({{ $transaksi->id }})"
                            class="text-red-500 hover:underline">
                            Hapus
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="border px-4 py-2 text-center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $transaksis->links() }}
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded shadow-lg p-6 w-1/3">
        <h2 class="text-lg font-bold mb-4">Konfirmasi Hapus</h2>
        <p class="mb-4">Apakah Anda yakin ingin menghapus transaksi ini?</p>
        <div class="flex justify-end">
            <button
                onclick="closeModal()"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                Batal
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');
        form.action = `/transaksi/${id}`;
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }
</script>
@endsection
