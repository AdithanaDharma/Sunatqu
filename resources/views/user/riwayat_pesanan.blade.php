<x-layouts.guest :title="__('Keranjang')">
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-5">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            {{-- <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Riwayat order</h2> --}}
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-5xl">
                    <div class="space-y-6">
                        @foreach ($order as $item)
                            {{-- {{ dd($item->transaksi_produk) }} --}}
                            <div class="bg-white border mb-5 border-slate-200 rounded-xl p-6 shadow-md">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-slate-800 font-semibold text-lg">order
                                        #{{ $order->total() - ($order->currentPage() - 1) * $order->perPage() - $loop->index }}
                                    </h3>
                                    @if($item->status == "terkirim")
                                        <span
                                            class="text-xs font-semibold bg-green-100 text-green-700 rounded-full px-3 py-1 select-none">Diterima</span>
                                    @elseif($item->status == "dibatalkan")
                                        <span
                                            class="text-xs font-semibold bg-red-100 text-red-700 rounded-full px-3 py-1 select-none">Dibatalkan</span>
                                    @else
                                        <span
                                            class="text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 select-none">Pending</span>
                                    @endif

                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-2 gap-x-6 text-slate-700 text-sm mb-4">
                                    <p><span class="font-semibold text-slate-800">Nama: </span>{{ $item->nama }}
                                    </p>
                                    <p><span class="font-semibold text-slate-800">Metode Pembayaran:

                                        </span>{{ $item->transaksi_produk->mode }} </p>

                                    <p><span class="font-semibold text-slate-800">Tanggal order:
                                        </span>{{ $item->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s') }}
                                    </p>
                                    <p><span class="font-semibold text-slate-800">Tanggal Diterima:
                                        </span>{{ $item->tanggal_dikirim}}</p>
                                    <p><span class="font-semibold text-slate-800">Total:
                                        </span>{{ 'Rp' . number_format($item->total, 2, ',', '.') }} </p>
                                    <p><span class="font-semibold text-slate-800">Status transaksi_produk:
                                        </span>
                                        @if($item->transaksi_produk->status == "disetujui")
                                            <span
                                                class="text-xs font-semibold bg-green-100 text-green-700 rounded-full px-3 py-1 select-none">Sukses</span>
                                        @elseif($item->transaksi_produk->status == "ditolak" || $item->transaksi_produk->status == "dikembalikan")
                                            <span
                                                class="text-xs font-semibold bg-red-100 text-red-700 rounded-full px-3 py-1 select-none">Gagal</span>
                                        @else
                                            <span
                                                class="text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 select-none">Menunggu</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="bg-slate-50 rounded-lg p-4 text-slate-900 text-sm mb-5">
                                    <p class="font-semibold mb-1">Item order:</p>
                                    @foreach($item->order_item as $items)
                                        <ul class="list-disc list-inside">
                                            <li>{{ $items->produk->nama  }} × {{ $items->quantity }} =
                                                {{ 'Rp' . number_format($items->harga * $items->quantity, 2, ',', '.') }}
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>

                                <div class="flex gap-5">



                                    @if($item->status == "terkirim")
                                        {{-- {{ route('cetak.pdf', ['id' => $item->id]) }} --}}
                                        <a href=""
                                            class="flex items-center w-40  gap-2 px-2 py-2 bg-secondary text-white font-medium  rounded-lg shadow hover:bg-orange2 transition duration-300"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-download-icon lucide-download">
                                                <path d="M12 15V3" />
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                <path d="m7 10 5 5 5-5" />
                                            </svg>Cetak Invoice</a>
                                    @elseif($item->status == "dibatalkan")
                                        <a disabled
                                            class="cursor-not-allowed flex items-center w-40  gap-2 px-2 py-2 bg-secondary text-white font-medium  rounded-lg shadow hover:bg-orange2 transition duration-300"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-download-icon lucide-download">
                                                <path d="M12 15V3" />
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                <path d="m7 10 5 5 5-5" />
                                            </svg>Cetak Invoice</a>
                                    @else
                                        <a disabled
                                            class="cursor-not-allowed flex items-center w-40  gap-2 px-2 py-2 bg-secondary text-white font-medium  rounded-lg shadow hover:bg-orange2 transition duration-300"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-download-icon lucide-download">
                                                <path d="M12 15V3" />
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                <path d="m7 10 5 5 5-5" />
                                            </svg>Cetak Invoice</a>
                                    @endif

                                    {{-- {{ dd($item->transaksi_produk->status) }} --}}
                                    @if($item->transaksi_produk->status == "disetujui")
                                        <button
                                            class=" hidden flex items-center gap-2 px-2 py-2 bg-secondary text-white font-medium rounded-lg shadow hover:bg-orange2 transition duration-300"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-credit-card-icon lucide-credit-card">
                                                <rect width="20" height="14" x="2" y="5" rx="2" />
                                                <line x1="2" x2="22" y1="10" y2="10" />
                                            </svg>Bayar</button>
                                    @elseif($item->transaksi_produk->status == "ditolak" || $item->transaksi_produk->status == "dikembalikan")
                                        <button
                                            class=" hidden flex items-center gap-2 px-2 py-2 bg-secondary text-white font-medium rounded-lg shadow hover:bg-orange2 transition duration-300"
                                            type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-credit-card-icon lucide-credit-card">
                                                <rect width="20" height="14" x="2" y="5" rx="2" />
                                                <line x1="2" x2="22" y1="10" y2="10" />
                                            </svg>Bayar</button>
                                    @elseif($item->transaksi_produk->status == "menunggu" && $item->transaksi_produk->mode == "transfer")
                                        <button onclick="payWithSnap('{{ $item->transaksi_produk->snap_token }}')"
                                            class=" flex items-center gap-2 px-2 py-2 bg-secondary text-white font-medium rounded-lg shadow hover:bg-orange2 transition duration-300"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                class="lucide lucide-credit-card-icon lucide-credit-card">
                                                <rect width="20" height="14" x="2" y="5" rx="2" />
                                                <line x1="2" x2="22" y1="10" y2="10" />
                                            </svg>Bayar</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        {{-- <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <a href="#" class="shrink-0 md:order-1">
                                    <img class="h-20 w-20 dark:hidden"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg"
                                        alt="imac image" />
                                    <img class="hidden h-20 w-20 dark:block"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg"
                                        alt="imac image" />
                                </a>

                                <label for="counter-input" class="sr-only">Choose quantity:</label>
                                <div class="flex items-center justify-between md:order-3 md:justify-end">
                                    <div class="flex items-center">
                                        <button type="button" id="decrement-button-2"
                                            data-input-counter-decrement="counter-input-2"
                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input type="text" id="counter-input-2" data-input-counter
                                            class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white"
                                            placeholder="" value="1" required />
                                        <button type="button" id="increment-button-2"
                                            data-input-counter-increment="counter-input-2"
                                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                            <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900 dark:text-white">$598</p>
                                    </div>
                                </div>

                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    <a href="#"
                                        class="text-base font-medium text-gray-900 hover:underline dark:text-white">Restored
                                        Apple Watch Series 8 (GPS) 41mm Midnight Aluminum Case with Midnight Sport
                                        Band</a>

                                    <div class="flex items-center gap-4">
                                        <button type="button"
                                            class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                            </svg>
                                            Add to Favorites
                                        </button>

                                        <button type="button"
                                            class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                    <nav aria-label="Pagination" class="mt-6 w flex justify-center">
                        <ul class="inline-flex items-center -space-x-px text-sm font-medium text-slate-700">
                            @if ($order->onFirstPage())
                                <li>
                                    <a disabled
                                        class="cursor-not-allowed px-3 py-1 rounded-l-lg border border-slate-300 bg-slate-100 text-slate-400">
                                        <span class="sr-only">&laquo;</span>
                                        <i class="fas fa-chevron-left"></i>
                                    </a>

                                </li>
                            @else
                                <li>
                                    <a href="{{ $order->previousPageUrl() }}"
                                        class=" px-3 py-1 rounded-l-lg border border-slate-300 bg-white hover:bg-slate-100">
                                        <span class="sr-only">&laquo;</span>
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                            @endif
                            @for ($i = 1; $i <= $order->lastPage(); $i++)
                                @if ($i == $order->currentPage())
                                    <li class="z-10 px-3 py-1 border border-slate-300 bg-slate-200 text-slate-900 rounded-none">
                                        {{$i }}</li>
                                @else
                                    <li> <a href="{{ $order->url($i) }}"
                                            class="px-3 py-1 border border-slate-300 bg-white hover:bg-slate-100 rounded-none">{{$i}}</a>
                                    </li>

                                @endif
                            @endfor
                            @if ($order->hasMorePages())
                                <li>
                                    <a href="{{ $order->nextPageUrl() }}"
                                        class=" px-3 py-1 rounded-r-lg border border-slate-300 bg-white hover:bg-slate-100">
                                        <span class="sr-only">&laquo;</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a disabled
                                        class="cursor-not-allowed px-3 py-1 rounded-r-lg border border-slate-300 bg-slate-100 text-slate-400">
                                        <span class="sr-only">&laquo;</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>

                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        {{-- @if(isset($snapToken)) --}}
        {{--
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <script type="text/javascript">

            window.onload = function (e) {
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function (result) {
                        // Redirect setelah sukses

                        window.location.href = "{{ route('home') }}";
                    },
                    onPending: function (result) {
                        // Redirect juga jika pending

                    },
                    onError: function (result) {
                        alert("Pembayaran gagal. Silakan coba lagi.");
                        window.location.href = "{{ route('belanja') }}";
                    }
                });
            };
        </script> --}}
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <script type="text/javascript">
            function payWithSnap(snapToken) {
                snap.pay(snapToken, {
                    onSuccess: function (result) {
                        window.location.href = "{{ route('user.riwayat') }}";
                    },
                    onPending: function (result) {
                        window.location.href = "{{ route('user.riwayat') }}";
                    },
                    onError: function (result) {
                        alert("Pembayaran gagal. Silakan coba lagi.");
                        window.location.href = "{{ route('user.riwayat') }}";
                    },
                    onClose: function () {
                        console.log("Pembayaran dibatalkan.");
                    }
                });
            }
        </script>
        {{-- @endif --}}
    @endpush
</x-layouts.guest>