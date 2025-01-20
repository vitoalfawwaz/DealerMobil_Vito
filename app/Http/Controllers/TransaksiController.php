<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kasir;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $transaksis = Transaksi::with('produk')
            ->orWhereHas('produk', function ($q) use ($search) {
                $q->where('nama_produk', 'like', "%{$search}%");
            })
            ->paginate(10); // Tambahkan paginate

        return view('transaksi.index', compact('transaksis'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Mendapatkan daftar produk dan kasir
        $produks = Produk::all();
        $selectedProduk = $request->produk_id ? Produk::find($request->produk_id) : null; // Jika ada produk yang dipilih

        return view('transaksi.create', compact('produks', 'selectedProduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_Pembeli' => 'required|string',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|in:cash,cashless',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // Hitung total harga
        $total_harga = $produk->harga * $request->jumlah;

        // Simpan transaksi
        Transaksi::create([
            'Nama_Pembeli' => $request->Nama_Pembeli,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksi.show', compact('transaksi'));
    }

    public function print($id)
    {
        $transaksi = Transaksi::with('produk')->findOrFail($id);

        return view('transaksi.print', compact('transaksi'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
