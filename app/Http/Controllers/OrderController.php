<?php

namespace App\Http\Controllers;

use App\Facades\Cart;
use App\Models\alamat;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $cart = Cart::get()['produk'];
        $alamat = alamat::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();
        // dd($alamat);
        return view('user.checkout', compact('alamat', 'cart'));
    }

    public function riwayat()
    {
        $order = Order::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('user.riwayat_pesanan', compact('order'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
