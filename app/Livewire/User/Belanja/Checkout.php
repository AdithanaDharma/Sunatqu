<?php

namespace App\Livewire\User\Belanja;

use App\Facades\Cart;
use App\Models\alamat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $alamat;

    public function ubah(){  
        $this->dispatch('ubah');
    }

    public function mount(){
        $this->alamat = alamat::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();
    }


    public function render()
    {
        return view('livewire.user.belanja.checkout',[
            'cart'=> Cart::get()['produk'],
            'alamat' => $this->alamat
              
        ]);
    }
}
