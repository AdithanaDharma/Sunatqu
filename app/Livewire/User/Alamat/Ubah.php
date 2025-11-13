<?php

namespace App\Livewire\User\Alamat;

use App\Models\alamat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Ubah extends Component
{

    public $show = false;
    public $alamat;

    public $nama, $nomer, $kota, $provinsi, $jalan, $patokan;
    protected $listeners = [
        'ubah' => 'tampil'
    ];

    public function update()
    {
        $alamat_baru = $this->alamat;
        $alamat_baru->nama = $this->nama;
        $alamat_baru->nomer = $this->nomer;
        $alamat_baru->kota = $this->kota;
        $alamat_baru->provinsi = $this->provinsi;
        $alamat_baru->alamat = $this->jalan;
        $alamat_baru->patokan = $this->patokan;
        $alamat_baru->update();
        session()->flash('message', 'Pesanan berhasil diupdate.');
        return $this->redirectRoute('user.checkout', navigate: true);
    }

    public function tampil()
    {
        $this->show = true;
    }
    public function mount()
    {
        $this->alamat = Alamat::where('user_id', Auth::id())
            ->where('isdefault', 1)
            ->first();
        $this->nama = $this->alamat->nama;
        $this->nomer = $this->alamat->nomer;
        $this->kota = $this->alamat->kota;
        $this->provinsi = $this->alamat->provinsi;
        $this->jalan = $this->alamat->alamat;
        $this->patokan = $this->alamat->patokan;
    }
    public function render()
    {
        return view('livewire.user.alamat.ubah', [
            'alamat' => $this->alamat
        ]);
    }
}
