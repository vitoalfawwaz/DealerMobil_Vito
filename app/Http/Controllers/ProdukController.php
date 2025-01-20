<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'harga' => 'required|numeric',
        'stok' => 'required|integer',
        'kondisi' => 'required|string',
        'transmisi' => 'required|string',
        'bahan_bakar' => 'required|string',
        'mesin' => 'required|string',
        'tempat_duduk' => 'required|integer',
        'kecepatan' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = $request->file('gambar') ? $request->file('gambar')->store('produk', 'public') : null;

    Produk::create([
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'kondisi' => $request->kondisi,
        'transmisi' => $request->transmisi,
        'bahan_bakar' => $request->bahan_bakar,
        'mesin' => $request->mesin,
        'tempat_duduk' => $request->tempat_duduk,
        'kecepatan' => $request->kecepatan,
        'gambar' => $path,
    ]);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
}


    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'nullable',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
