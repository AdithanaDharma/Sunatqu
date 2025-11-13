<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    /** @use HasFactory<\Database\Factories\PaketFactory> 
     * 
     */
    use HasFactory;


    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
    protected $casts = [
        'harga' => 'float',
        'bonus' => 'array',
        'deskripsi' => 'array',
    ];
}
