<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    /** @use HasFactory<\Database\Factories\PendaftaranFactory> */
    use HasFactory;
        public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
        public function transaksi_sunat()
    {
        return $this->hasOne(Transaksi_sunat::class);
    }
}
