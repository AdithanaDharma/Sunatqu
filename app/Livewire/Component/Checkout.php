<?php

namespace App\Livewire\Component;

use App\Models\paket;
use Livewire\Component;

class Checkout extends Component
{

    public $show;

    public $data, $paket;

    protected $listeners = [
        'tampil' => 'konfirmasi'
    ];



    public function konfirmasi(){
        $this->show = true;
    }

    public function mount(){
        $this->data = session('daftar');
        $paket_id = $this->data['paket_id'];
        $this->paket = paket::find($paket_id);
    }
    public function render()
    {
        return view('livewire.component.checkout');
    }
}
