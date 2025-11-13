<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    public function transaksi_produk()
    {
        return $this->hasOne(TransaksiProduk::class);
    }
    public function order_item()
    {
        return $this->hasMany(Order_item::class);
    }

    //  public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
