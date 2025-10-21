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
            Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->integer('umur');
            $table->float('berat_badan')->nullable();
            $table->string('nama_orang_tua');
            $table->string('no_whatsapp');
            $table->text('alamat');
            $table->date('jadwal_khitan');
            $table->time('waktu');
            $table->bigInteger('paket_id')->unsigned();
            $table->foreign('paket_id')->references('id')->on('pakets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
