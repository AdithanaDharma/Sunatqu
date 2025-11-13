<div>
     @livewire('admin.pesanan.update')
    <div class="relative  overflow-hidden md:overflow-x-auto shadow-md sm:rounded-lg ">
        {{-- @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-transition.duration.500ms
                x-init="setTimeout(() => show = false, 3000)"
                class="fixed max-w-screen md:w-auto md:bottom-5 overflow-hidden md:right-5 z-50 p-3 mb-2 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('message') }}
            </div>
        @endif --}}
        <div class="pb-4 bg-white flex md:w-full w-auto justify-between dark:bg-zinc-800 p-5">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="cari" type="text" id="table-search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-50 md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for items">
            </div>
            <a href="{{ route('admin.tambah.produk') }}">
                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-plus-icon lucide-plus">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>
                    {{-- <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m5 11 4-7"></path>
                        <path d="m19 11-4-7"></path>
                        <path d="M2 11h20"></path>
                        <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8c.9 0 1.8-.7 2-1.6l1.7-7.4"></path>
                        <path d="m9 11 1 9"></path>
                        <path d="M4.5 15.5h15"></path>
                        <path d="m15 11-1 9"></path>
                    </svg> --}}
                </button>
            </a>

        </div>
        <div class="overflow-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nomer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Pesanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Transaksi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr class="bg-white border-b dark:bg-zinc-900 dark:border-gray-700 border-gray-200">
                            {{-- <td class="p-4">
                                <img src="{{ $produks->gambar ? asset('storage/' . $produks->gambar) : asset('images/no-image.png') }}"
                                    class="w-10 md:w-15 rounded-md max-w-full max-h-full" alt="{{ $produks->nama }}">
                            </td> --}}
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nomer  }}
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($item->total, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->alamat }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status == 'terkirim')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                @elseif($item->status == 'dipesan')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu</span>
                                @elseif($item->status == 'dibatalkan')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Dibatalkan</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ dd($item->transaksi_produk) }} --}}
                                @if ($item->transaksi_produk->status == 'disetujui')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                @elseif($item->transaksi_produk->status == 'ditolak')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Dibatalkan</span>
                                @elseif($item->transaksi_produk->status == 'menunggu')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" wire:click="edit('{{ $item->id }}')"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delate</a>
                            </td>
                        </tr>
                    @endforeach
                    {{--
                    <tr class="bg-white border-b dark:bg-zinc-900 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>
                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            $1999
                        </td>
                        <td class="px-6 py-4 ">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delate</a>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-zinc-900">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>
                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            $99
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delate</a>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
        <div class="p-5">
            {{ $order->links() }}
        </div>
    </div>
</div>