<div>
    @if (session()->has('message'))
        <div id="toast-success" x-data="{ show: true }" x-show="show" x-transition.duration.500ms
            x-init="setTimeout(() => show = false, 3000)"
            class="flex fixed items-center md:top-5 z-50 w-full max-w-xs p-4 mb-4 text-gray-500 md:right-7  bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('message') }}</div>
            {{-- <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button> --}}
        </div>
    @endif
    @if ($show)

        <div class="fixed overflow-y-auto inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div
                class="w-full max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between  pb-4  rounded-t dark:border-gray-600 border-gray-200">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Detail Pesanan</h5>
                    <button type="button" wire:click="$toggle('show')"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form>
                    <input type="text" class="hidden" wire:model="nama">
                    {{-- <input type="text" class="hidden" wire:model="umur">
                    <input type="text" class="hidden" wire:model="berat">
                    <input type="text" class="hidden" wire:model="nama_ortu">
                    <input type="text" class="hidden" wire:model="no_whatsapp">
                    <input type="text" class="hidden" wire:model="jadwal_khitan">
                    <input type="text" class="hidden" wire:model="waktu">
                    <input type="text" class="hidden" wire:model="alamat"> --}}
                    <div class="grid gap-3 mb-2 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <p wire:model="nama" id="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{ $order->nama }}
                            </p>
                        </div>
                        <div>
                            <label for="Umur"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nomer</label>
                            <p wire:model="umur" id="Umur"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{ $order->nomer }}
                            </p>
                        </div>
                        {{-- <div>
                            <label for="Umur"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <p wire:model="umur"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                Tahun
                            </p>
                        </div> --}}
                        {{-- <div>
                            <label for="Berat Badan" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">No
                                Whatsapp</label>
                            <p wire:model="berat" id="Berat Badan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </p>
                        </div> --}}
                        <div>
                            <label for="Berat Badan"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Taanggal
                                Dikirim</label>

                            <p wire:model="berat" readonly type="" id="Berat Badan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{-- <span class="font-bold">Berat Badan :</span> --}}
                                @if ($order->tanggal_dikirim != null)
                                    {{ $order->tanggal_dikirim }}
                                @else
                                    -
                                @endif

                            </p>
                        </div>
                        <div>
                            <label for="visitors"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Dibatalkan</label>
                            <p type="number" id="visitors"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{-- <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300"></span>
                                --}}
                                @if ($order->tanggal_dibatalkan != null)
                                    {{ $order->tanggal_dibatalkan }}
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        {{-- <div>
                            <label for="visitors"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Waktu</label>
                            <p type="number" id="visitors"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </p>
                        </div>
                        <div>
                            <label for="visitors" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Hari
                                tanggal</label>
                            <p type="number" id="visitors"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </p>
                        </div> --}}

                        {{-- //status --}}
                        <div>
                            <label for="visitors"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Status
                                Transaksi</label>
                            <div
                                class="flex items-center justify-between bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus-within:ring-blue-500  w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                <p class="flex items-center w-full">
                                    @if ($transaksi == 'disetujui')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                    @elseif($transaksi == 'menunggu')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu</span>
                                    @elseif($transaksi == 'ditolak')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">Batal</span>
                                    @endif
                                </p>

                                <select wire:model.live="transaksi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 py-1 px-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="disetujui">Selesai</option>
                                    <option value="ditolak">Dibatalkan</option>
                                    <option value="menunggu">Menunggu</option>
                                </select>
                            </div>
                        </div>
                        <div>

                            <label for="visitors"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pesanan</label>
                            <div
                                class="flex items-center justify-between bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus-within:ring-blue-500  w-full px-2 py-1 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                                <p class="flex items-center w-full">
                                    @if ($status == 'terkirim')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                    @elseif($status == 'dipesan')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu</span>
                                    @elseif($status == 'dibatalkan')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">Dibatalkan</span>
                                    @endif
                                </p>

                                <select wire:model.live="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 py-1 px-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="terkirim">Selesai</option>
                                    <option value="dibatalkan">Dibatalkan</option>
                                    <option value="dipesan">Menunggu</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <p type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            {{ $order->alamat }},{{ $order->kota }}
                        </p>
                    </div>
                    <div class="mt-3 mb-3">
                        <h5 class="text-md font-bold text-gray-900 dark:text-white">Produk</h5>
                        {{-- <table class="w-full mt-2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="md:px-16 px-10 py-3">
                                        <span class="sr-only">Image</span>
                                    </th>
                                    <th scope="col" class="px-4 md:px-6 py-3">
                                        Produk
                                    </th>
                                    <th scope="col" class="px-4 md:px-6 py-3">
                                        Jumlah
                                    </th>
                                    <th scope="col" class="px-4 md:px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-4 md:px-6 py-3">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order_item as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                                    <td class="p-4">
                                        <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                                            class="w-10 md:w-10 rounded-md max-w-full max-h-full" alt="Apple Watch">
                                    </td>
                                    <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                                        {{ $item->produk->nama }}
                                    </td>
                                    <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">{{$item->quantity}}
                                    </td>
                                    <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">Rp
                                        {{ number_format($item->produk->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">Rp
                                        {{ number_format(($item->produk->harga * $item->quantity), 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table> --}}

                        <div class="relative overflow-x-auto border border-gray-200 rounded-lg">
                            {{-- <table
                                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="md:px-16 px-10 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-4 md:px-6 py-3">Produk</th>
                                        <th scope="col" class="px-4 md:px-6 py-3">Jumlah</th>
                                        <th scope="col" class="px-4 md:px-6 py-3">Harga</th>
                                        <th scope="col" class="px-4 md:px-6 py-3">Subtotal</th>
                                    </tr>
                                </thead>
                            </table> --}}

                            {{-- <!-- Scroll --> --}}
                            <div class="max-h-48 overflow-y-auto">
                                <table
                                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="md:px-16 px-10 py-3">
                                                <span class="sr-only">Image</span>
                                            </th>
                                            <th scope="col" class="px-4 md:px-6 py-3">Produk</th>
                                            <th scope="col" class="px-4 md:px-6 py-3">Jumlah</th>
                                            <th scope="col" class="px-4 md:px-6 py-3">Harga</th>
                                            <th scope="col" class="px-4 md:px-6 py-3">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_item as $item)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="p-4">
                                                    <img src="{{ asset('storage/' . optional($item->produk)->gambar) }}"
                                                        class="w-10 md:w-10 rounded-md max-w-full max-h-full"
                                                        alt="Gambar Produk">
                                                </td>
                                                <td class="px-6 py-2 font-semibold text-center text-gray-900 dark:text-white">
                                                    {{ optional($item->produk)->nama ?? 'Produk tidak ditemukan' }}
                                                </td>
                                                <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                                                    {{ $item->quantity }}
                                                </td>
                                                <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                                                    Rp {{ number_format(optional($item->produk)->harga ?? 0, 0, ',', '.') }}
                                                </td>
                                                <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                                                    Rp
                                                    {{ number_format((optional($item->produk)->harga ?? 0) * $item->quantity, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>




                    {{-- <div class="mb-3">
                        <label for="password"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" required />
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Confirm
                            password</label>
                        <input type="password" id="confirm_password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" required />
                    </div> --}}
                    {{-- <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree
                            with
                            the
                            <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                conditions</a>.</label>
                    </div> --}}

                    <button type="submit" wire:click="$toggle('show')"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Keluar</button>
                    <button type="button" wire:click="update"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Simpan</button>
                </form>

            </div>
        </div>
    @endif
</div>