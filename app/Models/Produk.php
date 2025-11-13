<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori_id',
        'gambar',
        'gambar_detail',
        'deskripsi',
        'harga',
        'stok',
        'status_stok'
    ];

    // public function kategori()
    // {
    //     return $this->hasone(kategori::class);
    // }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    
}
