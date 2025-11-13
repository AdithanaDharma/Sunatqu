<?php

namespace App\Livewire\Admin\Pesanan;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $cari;

    protected $updatesQueryString = [
        ['search' => ['except' => '']],
    ];
    public function updatingCari()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->cari = request()->query('search', $this->cari);
    }
           
    public function edit($id){
        $this->dispatch('edit',$id);
        // dd($id);
    }

    public function render()
    {
        // $order = Order::with('transaksi_produk')->find(1);
        // dd($order->toArray());
        return view('livewire.admin.pesanan.index', [
            'order' =>  $this->cari === null ? 
            Order::latest()->paginate(6):  
            Order::latest()->where('nama','like','%'.$this->cari.'%')->paginate(6)

        ]);
    }
}
