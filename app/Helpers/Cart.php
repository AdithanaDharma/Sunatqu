<?php

namespace App\helpers;

use App\Models\Produk;

class Cart
{
    public function __construct()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }

    public function set($cart)
    {
        request()->session()->put('cart', $cart);
    }

    public function get()
    {
        return request()->session()->get('cart');
    }

    public function empty()
    {
        return [
            'produk' => []
        ];
    }

    public function add(Produk $produk, $qty)
    {
        $cart = $this->get();
        // dd($cart['produk']);
        foreach ($cart['produk'] as $index => $item) {
            //  dd($item[0]);
            if ($item[0]['id'] === $produk->id) {
                $cart['produk'][$index]['qty'] += $qty;
                $this->set($cart);
                // dd( $item['qty']);
                return;
            }
        }
        array_push($cart['produk'], [
            $produk,
            'qty' => $qty
        ]);
        // dd(vars: $cart);
        $this->set($cart);
    }

    public function tambah($produk_id)
    {
        $cart = $this->get();
        foreach ($cart['produk'] as $index => $item) {
            if ($item[0]['id'] === $produk_id) {
                $cart['produk'][$index]['qty'] += 1;
                $this->set($cart);
                return;
            }
        }
    }
    public function kurang($produk_id)
    {
        $cart = $this->get();
        foreach ($cart['produk'] as $index => $item) {
            if ($item[0]['id'] === $produk_id) {
                if ($item['qty'] > 1) {
                    $cart['produk'][$index]['qty'] -= 1;
                    $this->set($cart);
                    return;
                }else{
                    // $cart['produk'][$index]['qty'] -= 1;
                    $this->remove($produk_id);
                    // return;
                }
            }
        }
    }

    public function remove($produk_id)
    {
        $cart = $this->get();
        array_splice(
            $cart['produk'],
            array_search(
                $produk_id,
                array_column(
                    $cart['produk'],
                    'id'
                )
            ),
            1
        );
        $this->set($cart);
    }



    public function clear()
    {
        $this->set($this->empty());
    }
}
