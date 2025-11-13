<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function belanja()
    {
        // $produk = Produk::all();
        return view('user.belanja');
    }
    public function keranjang()
    {
        // $produk = Produk::all();
        return view('user.keranjang');
    }

    public function update($id){
        $produk = Produk::find($id);
        return view('admin.update_produk',compact('produk'));
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ketegori_id' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'Stok' => 'required|integer',
            'Status_stok' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
        $Product = new Produk();
        $Product->nama = $request->nama;
        // $Product->slug = Str::slug($request->name);
        $Product->harga = $request->harga;
        $Product->deskripsi = $request->deskripsi;
        $Product->Stok = $request->Stok;
        $Product->Status_stok = $request->Status_stok;
        $current_timestamp = Carbon::now()->timestamp;
        $produk = Produk::all();
        return view('belanja');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Produk $produk)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
