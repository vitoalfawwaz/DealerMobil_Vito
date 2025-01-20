<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Pembeli');
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('total_harga', 15, 2);
            $table->string('metode_pembayaran', 50); // Menyimpan metode pembayaran (cash/cashless)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
