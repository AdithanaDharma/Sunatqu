<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->String('nama');
            $table->bigInteger('kategori_id');
            $table->string('gambar')->nullable();
            $table->string('gambar_detail')->nullable();
            $table->text('deskripsi');
            $table->decimal('harga');
            $table->unsignedInteger('Stok')->default(10);
            $table->enum('Status_stok', ['tersedia', 'tidak tersedia']);
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
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
