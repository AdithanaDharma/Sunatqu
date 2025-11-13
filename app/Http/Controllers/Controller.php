<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\paket;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function home()
    {
        $paket = paket::all();
        return view('landingpage', compact('paket'));
    }
    public function riwayat()
    {
        $order = Order::where('user_id', Auth::user()->id)->with(['order_item', 'transaksi_produk'])
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('user.riwayat-pesanan', compact('order'));
    }
}
