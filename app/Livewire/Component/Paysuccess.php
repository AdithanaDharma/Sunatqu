<?php

namespace App\Livewire\Component;

use Livewire\Component;

class Paysuccess extends Component
{
    public $show;

    protected $listeners = [
        'berhasil' => 'tampil'
    ];

    public function tampil(){
        $this->show = true;
        dd($this->show);
    }
    public function render()
    {
        return view('livewire.component.paysuccess');
    }
}
