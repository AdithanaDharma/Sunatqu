<div>
    @livewire('admin.pendaftaran.update')
    <div class=" relative mb-10 overflow-hidden rounded-xl border-neutral-200 dark:border-neutral-700">
        {{-- <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        --}}

        <div
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg dark:bg-zinc-900  dark:border-gray-700 ">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Belum di layani</h5>
            <p id="status" class="font-normal text-gray-700 dark:text-gray-400 mb-1">status : <span wire:ignore
                    id="statusBadge" class="px-1 py-0.5 rounded-sm text-xs font-medium">-</span></p>
            <h5 id="data" class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white ">Prediksi
                HB : </h5>
            {{-- <button wire:click="dispatch('mulaiPengukuran',{ alat: 'Hemify 1' })" type="button"
                class="text-white hover:text-gray-800 border-2 border-gray-800 bg-gray-800 hover:bg-white focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-50 dark:focus:ring-gray-700 dark:border-gray-700">mulai
                pengukuran</button> --}}
        </div>

    </div>
    <div class="relative  overflow-hidden dark:bg-zinc-900 md:overflow-x-auto shadow-md sm:rounded-lg ">
        {{-- @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-transition.duration.500ms
            x-init="setTimeout(() => show = false, 3000)"
            class="fixed max-w-screen md:w-auto md:bottom-5 overflow-hidden md:right-5 z-50 p-3 mb-2 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('message') }}
        </div>
        @endif --}}
        <div class="pb-4 bg-white flex md:w-full w-auto justify-between dark:bg-zinc-900 p-5">
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
            {{-- <a href="{{ route('admin.tambah.produk') }}">
                <button type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-plus-icon lucide-plus">
                        <path d="M5 12h14" />
                        <path d="M12 5v14" />
                    </svg>

                </button>
            </a> --}}

        </div>
        <div class="overflow-auto p-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 overflow-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Umur
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Berat badan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Paket
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama orang Tua
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            No Whatsapp
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Transaksi
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            status
                        </th>
                        <th scope="col" class="px-3 py-3 text-center">
                            Hari
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Waktu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftaran as $item)
                        <tr class="bg-white border-b dark:bg-zinc-900 dark:border-gray-700 border-gray-200">

                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_anak }}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $item->umur ?? 'Tidak ada kategori' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{-- Rp {{ number_format($item->harga, 0, ',', '.') }} --}}
                                {{ $item->berat_badan }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $item->paket->tipe_paket }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $item->nama_orang_tua}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $item->no_whatsapp  }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{-- {{ $item->transaksi_sunat->status }} --}}
                                @if ($item->transaksi_sunat->status == 'disetujui')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                @elseif($item->transaksi_sunat->status == 'ditolak')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Dibatalkan</span>
                                @elseif($item->transaksi_sunat->status == 'menunggu')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{-- {{ $item->transaksi_sunat->status }} --}}
                                @if ($item->status == 'selesai')
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                @elseif($item->status == 'menunggu')
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu</span>
                                @elseif($item->status == 'dibatalkan')
                                    <span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Dibatalkan</span>
                                @endif
                            </td>
                            <td class="px-3 py-4 text-center">
                                {{-- {{ $item->jadwal_khitan }} --}}
                                {{ \Carbon\Carbon::parse($item->jadwal_khitan)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ \Carbon\Carbon::parse($item->jadwal_khitan)->format('h:m') }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" wire:click="edit('{{ $item->id }}')"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delate</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="p-5 dark:bg-zinc-900">
                {{ $pendaftaran->links() }}
            </div>
        </div>


    </div>
</div>