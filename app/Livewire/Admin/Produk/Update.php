<?php

namespace App\Livewire\Admin\Produk;

use App\Models\kategori;
use App\Models\Produk;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;


class Update extends Component
{
    use WithFileUploads;
    public $produk;
    public $nama;
    public $kategori_id;
    public $Stok;
    public $harga;
    public $gambar;
    public $gambar_lama;
    public $deskripsi;
    public $gambar_detail = [];
    public $gambar_detail_lama = [];



    protected $rules = [
        'nama' => 'required|',
        'kategori_id' => 'required',
        'Stok' => 'required|numeric',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048',
        'gambar_detail' => 'nullable|array',
        'gambar_detail.*' => 'nullable|image|max:2048',
    ];


    public function mount(Produk $produk)
    {
        // $this->produk = $produk;
        $this->nama = $produk->nama;
        $this->kategori_id = $produk->kategori_id;
        $this->Stok = $produk->Stok;
        $this->harga = $produk->harga;
        $this->deskripsi = $produk->deskripsi;
        $this->gambar_lama = $produk->gambar ? asset('storage/' . $produk->gambar) : null;

        $detail = json_decode($produk->gambar_detail, true);
        if (is_array($detail)) {
            foreach ($detail as $file) {
                $this->gambar_detail_lama[] = asset('storage/' . $file);
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.produk.update', [
            // 'produk' => Produk::find($this->id),
            'kategori_pilih' => kategori::find($this->produk->kategori_id),
            'kategori' => kategori::all()
        ]);
    }

    public function update()
    {
        $this->validate();
        $slug = Str::slug($this->nama);


        if ($this->produk->id) {
            $produk = Produk::find($this->produk->id);
            $produk->nama        = $this->nama;
            $produk->kategori_id = $this->kategori_id;
            $produk->harga       = $this->harga;
            $produk->Stok        = $this->Stok;
            if ($this->Stok === null) {
                $produk->Status_stok = 'tidak tersedia';
            } else {
                $produk->Status_stok = 'tersedia';
            };

            $produk->deskripsi   = $this->deskripsi;

            if ($this->gambar) {
                Storage::disk('public')->delete($produk->gambar);
                $path = $this->gambar->store("produk/$slug", 'public');
                $produk->gambar = $path;

                $image = Image::read($this->gambar->getRealPath())
                    ->resize(800, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                $filename = time() . ".jpg";
                $path = "produk/$slug/$filename";

                Storage::disk('public')->put($path, (string) $image->toJpeg(85));

                $produk->gambar = $path;
            }

            $detailPaths = [];
            if ($this->gambar_detail) {
                $oldDetail = json_decode($produk->gambar_detail, true);
                if (is_array($oldDetail)) {
                    foreach ($oldDetail as $file) {
                        Storage::disk('public')->delete($file);
                    }
                }

                foreach ($this->gambar_detail as $file) {
                    $img = Image::read($file->getRealPath())
                        ->resize(800, 800, function ($constraint) {
                            $constraint->aspectRatio();
                        });

                    $filename = uniqid() . ".jpg";
                    $detailPath = "produk/$slug/detail/$filename";

                    Storage::disk('public')->put($detailPath, (string) $img->toJpeg(85));
                    $detailPaths[] = $detailPath;
                }

                $produk->gambar_detail = json_encode($detailPaths);
            }
        }
        $produk->update();
        session()->flash('message', 'Produk berhasil diupdate.');
        return $this->redirectRoute('admin.produk', navigate: true);
    }
}
