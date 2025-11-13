<?php

namespace App\Livewire\Admin\Pendaftaran;

use App\Models\Pendaftaran;
use App\Models\Transaksi_sunat;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Update extends Component
{
    public $show = false;
    public $data, $iddata;
    public $nama, $umur, $berat, $nama_ortu, $no_whatsapp, $alamat, $jadwal_khitan, $waktu, $paket;
    public $transaksi, $status;
    protected $listeners = [
        'edit' => 'edithendel'
    ];

    protected $rules = [
        'status' => 'required',
        'transaksi' => 'required',
    ];

    public function edithendel($id)
    {
        $this->data = Pendaftaran::find($id);
        $this->iddata = $id;
        $this->nama = $this->data->nama_anak;
        $this->umur = $this->data->umur;
        $this->berat = $this->data->berat_badan;
        $this->nama_ortu = $this->data->nama_orang_tua;
        $this->no_whatsapp = $this->data->no_whatsapp;
        $this->alamat = $this->data->alamat;
        $this->paket = $this->data->paket->tipe_paket;
        $this->jadwal_khitan = $this->data->jadwal_khitan;
        $this->waktu = $this->data->waktu;
        $this->transaksi = $this->data->transaksi_sunat->status;
        $this->status = $this->data->status;
        // dd( $this->nama);
        $this->show = true;
    }

    public function update()
    {
        $this->validate();

        $databaru = $this->data;
        // dd($databaru);
        $transaksi = Transaksi_sunat::where('pendaftaran_id', 'like', '%' . $this->iddata . '%')->first();
        $databaru->status = $this->status;
        $transaksi->status = $this->transaksi;
        // dd($databaru->status,$transaksi);
        $databaru->update();
        $transaksi->update();
        session()->flash('message', 'Produk berhasil diupdate.');
        return $this->redirectRoute('admin.pendaftaran', navigate: true);
    }

    // public function mount(){
    //     $this->nama =  $this->data->nama_anak;
    // } 

    public function render()
    {
        return view('livewire.admin.pendaftaran.update');
    }
}
