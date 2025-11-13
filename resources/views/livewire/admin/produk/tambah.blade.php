<div>
    <form wire:submit.prevent="simpan" method="POST">
        <div class="grid p-10 rounded-xl shadow-md md:grid-cols-2 md:grid-rows-5 gap-10">
            <div class="row-span-5">

                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Produk</label>
                    <input wire:model="nama" type="text" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan nama produk" />
                    @error('nama')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="Kategori"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select wire:model="kategori_id" id="Kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected class="text-gray-400">Pilih kategori</option>
                        @foreach ($kategori as $kategoris)
                            <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="Stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input wire:model="Stok" type="number" id="Stok"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan stok produk" required />
                    @error('Stok')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="Harga"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input wire:model="harga" type="number" id="Harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan harga produk" required />
                    @error('harga')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- //deskripsi --}}
                <div class="mb-6">

                    <label for="Deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        Deskripsi</label>
                    <textarea wire:model="deskripsi" id="Deskripsi" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="masukan deskripsi produk"></textarea>
                    @error('deskripsi')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror

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
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click
                                            to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                @endif

                            </div>
                        </label>
                        @error('gambar')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                {{-- //gambar_detail --}}
                <div class="mb-6">
                    <label for="gambar_detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Gambar</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="gambar_detail"
                            class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            {{-- @if ($gambar_detail)
                            <img src="{{  $gambar_detail > temporaryUrl() }}" alt="">
                            @endif --}}
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
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                @endif
                            </div>


                        </label>
                        @error('gambar_detail')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                
                    <a href="{{ route('admin.produk') }}"><button type="button"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-3">Batal</button></a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                

            </div>
    </form>

</div>