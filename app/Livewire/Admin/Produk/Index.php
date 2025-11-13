<?php

namespace App\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $cari;
    public function updatingCari()
    {
        $this->resetPage();
    }
    protected $updatesQueryString = [
        ['search' => ['except' => '']],
    ];

    public function mount()
    {
        $this->cari = request()->query('search', $this->cari);
    }

    public function render()
    {
        // $produk = Produk::latest()->paginate(10);
        return view('livewire.admin.produk.index', [
            'produk' => $this->cari === null ?
                Produk::latest()->paginate(5) :
                Produk::latest()->where('nama', 'like', '%' . $this->cari . '%')->where('status_stok', 'like', '%' . $this->cari . '%')->paginate(5)
        ]);
    }
}
