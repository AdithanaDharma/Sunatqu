<div>

    <section class="flex items-center justify-center py-4 px-4 gap-3">
        {{-- <button
            class="border-none bg-white rounded-full w-9 h-9 text-lg cursor-pointer hover:bg-gray-100">❮</button> --}}
        <div class="flex gap-3 overflow-x-auto">
            <button
                class="border border-gray-300 bg-white px-4 py-2 rounded-full cursor-pointer whitespace-nowrap transition-colors hover:bg-gray-200">All
                Categories</button>
            @foreach ($kategori as $item)
                <button
                    class="border border-gray-300 bg-white px-4 py-2 rounded-full cursor-pointer whitespace-nowrap transition-colors hover:bg-gray-200">{{$item->nama}}</button>
            @endforeach
            {{--
            <button
                class="border border-gray-300 bg-white px-4 py-2 rounded-full cursor-pointer whitespace-nowrap transition-colors hover:bg-gray-200">Ring
                Meter</button>
            <button
                class="border border-gray-300 bg-white px-4 py-2 rounded-full cursor-pointer whitespace-nowrap transition-colors hover:bg-gray-200">Celana
                Sunat</button>
            <button
                class="border border-gray-300 bg-white px-4 py-2 rounded-full cursor-pointer whitespace-nowrap transition-colors hover:bg-gray-200">Madejet
            </button>
            <button
                class="border border-gray-300 bg-white px-4 py-2 rounded-full cursor-pointer whitespace-nowrap transition-colors hover:bg-gray-200">Madejet
            </button> --}}
        </div>
        {{-- <button
            class="border-none bg-white rounded-full w-9 h-9 text-lg cursor-pointer hover:bg-gray-100">❯</button> --}}
    </section>

    <!-- BANNER -->
    <section class="relative w-full flex justify-center">
        <div
            class="w-[95%] sm:w-[92%] md:w-[90%] lg:w-[88%] aspect-[18/4] rounded-xl overflow-hidden shadow-md bg-gradient-to-br from-[#588157] to-[#A3B18A]">
            <img src="{{ asset('storage/aset/jokes.png') }}" alt="Hero Image"
                class="w-full h-full object-contain sm:object-cover object-center">
        </div>
    </section>


    <!-- PRODUK -->
    <section class="py-8 md:px-20">
        <div class="mb-5">
            <h2 class="text-xl font-bold">Rekomendasi Produk</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 justify-items-center">




            @foreach ($produk as $item)
                {{-- <div
                    class="produk-card bg-white rounded-lg p-3 text-center w-full max-w-xs shadow-sm transition-all duration-300 cursor-pointer hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Celana Sunat" class="w-full rounded-lg">
                    <h3 class="text-sm font-medium mt-2 mb-1">{{ $item->nama }}</h3>
                    <p class="text-gray-700 font-medium mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <button
                        class="bg-gradient-to-r from-emerald-800 to-emerald-600 text-white text-lg border-none w-full py-2 rounded-md cursor-pointer transition-opacity hover:opacity-90">Tambah
                        ke keranjang</button>
                </div> --}}

                <div
                    class="w-full max-w-sm bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 transition-all duration-300 hover:-translate-y-1 hover:scale-105">
                    <a href="#" class="rounded-lg">
                        <img class="p-2 rounded-lg" src="{{ asset('storage/' . $item->gambar) }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$item->nama}}
                            </h5>
                        </a>
                        <div class=" text-xs font-semibold py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800 ">
                            <span
                                class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-200 dark:text-blue-800">
                                {{ $item->kategori->nama }}
                            </span>
                        </div>

                        <div class="flex items-center mt-2.5 mb-5">
                            {{-- <div
                                class="flex items-center space-x-1 rtl:space-x-reverse max-h-25 min-h-20 overflow-y-auto scrollbar-hide">
                                {{ $item->deskripsi }}
                            </div> --}}
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 items-center justify-between">
                            <div class=" text-xl font-bold text-gray-900 dark:text-white">Rp
                                {{ number_format($item->harga, 0, ',', '.') }}
                            </div>
                            <button wire:click="addtocart({{ $item->id }})"
                                class="text-white bg-gradient-to-br from-[#588157] to-[#A3B18A] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Add
                                to cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>