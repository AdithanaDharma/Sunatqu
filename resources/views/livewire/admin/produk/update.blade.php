<div>
    <form wire:submit.prevent="update" method="POST">
        <div class="grid p-10 rounded-xl shadow-md md:grid-cols-2 md:grid-rows-5 gap-10">
            <div class="row-span-5">
                {{-- {{ dd($produk->nama) }} --}}
                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Produk</label>
                    <input wire:model="nama" type="text" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan nama produk" value="{{$produk->nama}}" />
                    @error('nama')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="Kategori"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select value="{{ $produk->kategori }}" wire:model="kategori_id" id="Kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @if ($produk->kategori_id)
                            <option selected value="{{ $produk->kategori_id}}">{{ $kategori_pilih->nama }}</option>
                            @foreach ($kategori as $kategoris)
                                <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                            @endforeach
                        @else
                            <option selected class="text-gray-400">Pilih kategori</option>
                            @foreach ($kategori as $kategoris)
                                <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('kategori_id')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="Stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input wire:model="Stok" type="number" id="Stok"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan stok produk" value="{{ $produk->Stok }}" required />
                    @error('Stok')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="Harga"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input wire:model="harga" type="number" id="Harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan harga produk" value="{{ $produk->harga }}" required />
                    @error('harga')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- //deskripsi --}}
                <div class="mb-6">

                    <label for="Deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Deskripsi</label>
                    <textarea value="{{ $produk->deskripsi }}" wire:model="deskripsi" id="Deskripsi" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan deskripsi produk">{{ $produk->deskripsi }}</textarea>

                </div>

            </div>

            <div class="row-span-5 ">

                {{-- //gambar --}}
                <div class="mb-6">
                    <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Gambar</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="gambar"
                            class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <input wire:model="gambar" id="gambar" type="file" class="hidden" />
                                @if ($gambar)
                                    <img src="{{ $gambar->temporaryUrl() }}" class="w-32">
                                @else
                                    <img src="{{ $gambar_lama }}" class="w-32">
                                @endif

                            </div>


                        </label>
                    </div>

                </div>

                {{-- //gambar_detail --}}
                <div class="mb-6">
                    <label for="gambar_detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Gambar</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="gambar_detail"
                            class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <input wire:model="gambar_detail" id="gambar_detail" type="file" class="hidden"
                                    multiple />
                                @if ($gambar_detail)
                                    <div class="flex">
                                        @foreach ($gambar_detail as $img)
                                            <img src="{{ $img->temporaryUrl() }}" class="w-32">
                                        @endforeach
                                    </div>
                                @else
                                    <div class="flex">
                                        @foreach ($gambar_detail_lama as $img)
                                            <img src="{{ $img }}" class="w-32">
                                        @endforeach
                                    </div>
                                @endif
                            </div>


                        </label>
                    </div>

                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>

        </div>
    </form>

</div>