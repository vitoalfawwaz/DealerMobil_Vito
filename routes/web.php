<?php

use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProdukController::class, 'index'])->name('produk.index');

Route::get('/transaksi/{id}/print', [TransaksiController::class, 'print'])->name('transaksi.print');
Route::resource('produk', ProdukController::class);
Route::resource('transaksi', TransaksiController::class);

Route::post('transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
