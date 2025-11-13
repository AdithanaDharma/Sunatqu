<?php

namespace App\Livewire;

use App\Facades\Cart;
use Livewire\Component;

class Keranjang extends Component
{
    public $carttotal = 0;

    protected $listeners = [
        'addtocart' => 'cartupdatetotal',
        'hapus' => 'cartupdatetotal'
    ];

    public function mount()
    {
        $this->cartupdatetotal();
    }

    public function cartupdatetotal()
    {
        $this->carttotal = count(Cart::get()['produk']);
    }

    public function cart()
    {
        $this->dispatch('cart');
        // return redirect()->route('keranjang');
    }

    public function render()
    {
        
        return view('livewire.keranjang');
    }
}
