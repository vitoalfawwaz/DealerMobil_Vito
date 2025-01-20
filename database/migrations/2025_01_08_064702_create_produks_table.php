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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2);
            $table->integer('stok');
            $table->string('gambar')->nullable(); // Kolom untuk gambar
            $table->string('kondisi')->nullable();
            $table->string('transmisi')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->string('mesin')->nullable();
            $table->integer('tempat_duduk')->nullable();
            $table->integer('kecepatan')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
