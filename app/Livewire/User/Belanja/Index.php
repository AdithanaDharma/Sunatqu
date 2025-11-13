<?php

namespace App\Livewire\User\Belanja;

use App\Facades\Cart;
use App\Models\kategori;
use App\Models\Produk;
use Livewire\Component;

class Index extends Component
{

    public function addtocart($produk_id)
    {
        $produk = Produk::find($produk_id);
        Cart::add($produk, 1);
        $item = Cart::get()['produk'];
        $this->dispatch('addtocart');
        $this->dispatch('showToast', message: 'Produk berhasil ditambahkan ✅');
        // session()->flash('message', 'Produk berhasil ditambahkan.');
        // return $this->redirectRoute('belanja', navigate: true);
        // dd($item[0][0]['id']);

    }
    public function render()
    {
        return view('livewire.user.belanja.index', [
            'produk' => Produk::all(),
            'kategori' => kategori::all()
        ]);
    }
}
