<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_sunat extends Model
{
    /** @use HasFactory<\Database\Factories\TransaksiSunatFactory> */
    use HasFactory;
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
