<?php

namespace App\Livewire\Admin\Produk;

use App\Models\kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Laravel\Facades\Image;

class Tambah extends Component
{
    use WithFileUploads;
    public $nama;
    public $kategori_id;
    public $Stok;
    public $harga;
    public $gambar;
    public $deskripsi;
    public $gambar_detail = [];


    protected $rules = [
        'nama' => 'required|min:6',
        'kategori_id' => 'required',
        'Stok' => 'required|numeric',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'gambar' => 'required|image|max:2048',
        'gambar_detail' => 'required|array',
        'gambar_detail.*' => 'image|max:2048',
    ];

    public function render()
    {
        return view('livewire.admin.produk.tambah', [
            'kategori' => kategori::all()
        ]);
    }

    public function simpan()
    {
        $this->validate();
        $produk = new Produk();
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

        $slug = Str::slug($this->nama);

        if ($this->gambar) {
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

        $produk->save();
        session()->flash('message', 'Produk berhasil disimpan.');
        return $this->redirectRoute('admin.produk', navigate: true);
    }
}

        // $detailgambar = [];
        // if ($this->gambar_detail) {
        //     foreach ($this->gambar_detail as $file) {
        //         $detailgambar[] = $file->store("produk/$slug/detail", 'public');
        //     }
        //     $produk->gambar_detail = json_encode($detailgambar);
        // }
