<?php

namespace App\Livewire\Admin\Pesanan;

use App\Models\Order;
use App\Models\order_item;
use App\Models\TransaksiProduk;
use Livewire\Component;

class Update extends Component
{

    public  $show = false;
    public $order, $order_item, $id_order;
    public $nama, $total, $nomer, $transaksi, $status, $alamat, $tanggal_dikirim, $tanggal_dibatalkan;
    protected $listeners = [
        'edit' => 'edithendel'
    ];

    protected $rules = [
        'status' => 'required',
        'transaksi' => 'required',
    ];

    public function edithendel($id)
    {
        $this->order = Order::find($id);
        $this->id_order = $id;
        $this->order_item = Order_item::where('order_id', $this->order->id)->get();
        $this->transaksi = $this->order->transaksi_produk->status;
        $this->status = $this->order->status;
        $this->show = true;

        // foreach ($this->order_item as $item) {
            // dd($this->transaksi);
        // }
    }

    public function update()
    {
        $this->validate();

        $order_baru = $this->order;
        // dd($order_baru);
        $transaksi = TransaksiProduk::where('order_id', 'like', '%' . $this->id_order . '%')->first();
        $order_baru->status = $this->status;
        if($this->status == 'terkirim'){
            $order_baru->tanggal_dikirim = now();
        }elseif($this->status == 'dibatalkan'){
            $order_baru->tanggal_dibatalkan = now();
        }   
        $transaksi->status = $this->transaksi;
        // dd($order_baru->status,$transaksi);
        $order_baru->update();
        $transaksi->update();
        session()->flash('message', 'Pesanan berhasil diupdate.');
        return $this->redirectRoute('admin.pesanan', navigate: true);
    }



    public function render()
    {
        return view('livewire.admin.pesanan.update');
    }
}
