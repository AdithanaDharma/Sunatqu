<?php

namespace App\Livewire\Admin\Pendaftaran;

use App\Models\Pendaftaran;
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

    public function edit($id){
        $this->dispatch('edit',$id);
    }

    public function mount()
    {
        $this->cari = request()->query('search', $this->cari);
    }
    public function render()
    {
        return view('livewire.admin.pendaftaran.index', [

            'pendaftaran' => $this->cari === null ? 
            Pendaftaran::latest()->paginate(6) :
            Pendaftaran::latest()->where('nama_anak','like','%'.$this->cari.'%')->paginate(6)
        ]);
    }
}
