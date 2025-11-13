<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
