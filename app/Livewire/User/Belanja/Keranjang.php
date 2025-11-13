<?php

namespace App\Livewire\User\Belanja;

use App\Facades\Cart;
use Livewire\Component;

class Keranjang extends Component
{
    public $show;
    public $total;
    public $cart;

    protected $listeners = [
        'cart' => 'cartshow'
    ];

    public function checkout(){}

    public function mount()
    {
        $this->cart = Cart::get()['produk'];
        $this->gettotal();
        // dd($this->cart);
    }

    public function gettotal()
    {
        $this->total = 0;
        $this->cart = Cart::get()['produk'];
        if ($this->cart) {
            foreach ($this->cart as $item) {
                $this->total += $item[0]['harga'] * $item['qty'];
            }
        }
    }

    public function tambah($produk_id)
    {
        Cart::tambah($produk_id);
        $this->cart = Cart::get()['produk'];
        $this->gettotal();
        // dd($produk_id);
    }
    public function kurang($produk_id)
    {
        Cart::kurang($produk_id);
        $this->cart = Cart::get()['produk'];
        $this->dispatch('hapus');
        $this->gettotal();
        // dd($produk_id);
    }

    public function hapus($produk_id)
    {
        Cart::remove($produk_id);
        $this->cart = Cart::get()['produk'];
        $this->dispatch('hapus');
        $this->gettotal();
    }

    public function cartshow()
    {
        $this->cart = Cart::get()['produk'];
        $this->show = true;
        $this->gettotal();
    }
    public function render()
    {
        return view('livewire.user.belanja.keranjang');
    }
}
