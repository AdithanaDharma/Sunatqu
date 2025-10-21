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
        Schema::create('transaksi_sunats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pendaftaran_id')->unsigned();
            $table->enum('mode', ['cash', 'transfer']);
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'dikemambalikan'])->default('menunggu');
            $table->string('snap_token')->nullable();
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_sunats');
    }
};
