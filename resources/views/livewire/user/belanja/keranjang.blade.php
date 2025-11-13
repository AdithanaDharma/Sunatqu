<div>
    @if ($show)
        <div class="fixed overflow-y-auto  inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div
                class="w-full max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between  pb-4  rounded-t dark:border-gray-600 border-gray-200">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Keranjang</h5>
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
                <div class="max-h-[400px] overflow-y-auto relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="md:px-16 px-10 py-3">
                                    <span class="sr-only">Image</span>
                                </th>
                                <th scope="col" class="px-4 md:px-6 py-3">
                                    Product
                                </th>
                                <th scope="col" class="px-4 md:px-6 py-3">
                                    Qty
                                </th>
                                <th scope="col" class="px-4 md:px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-4 md:px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($cart)
                                @foreach ($cart as $item)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <td class="p-4">
                                            <img src="{{ asset('storage/' . $item[0]['gambar']) }}"
                                                class="w-10 md:w-15 rounded-md max-w-full max-h-full" alt="Apple Watch">
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                            {{ $item[0]['nama'] }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <button wire:click="kurang({{ $item[0]['id'] }})"
                                                    class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                    type="button">
                                                    <span class="sr-only">Quantity button</span>
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <div>
                                                    <input type="number" id="first_product"
                                                        class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder=" " value="{{ $item['qty']}}" required />
                                                </div>
                                                <button wire:click="tambah({{ $item[0]['id'] }})"
                                                    class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                    type="button">
                                                    <span class="sr-only">Quantity button</span>
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">Rp
                                            {{ number_format($item[0]['harga'], 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" wire:click="hapus({{ $item[0]['id'] }})"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" rowspan="5"
                                        class=" text-xl font-bold text-center py-6 text-gray-500 dark:text-gray-300">
                                        Keranjang kosong
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>

                </div>
                <div class="py-3 flex justify-between">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Total</h5>
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Rp
                        {{ number_format($total, 0, ',', '.') }}
                    </h5>
                </div>
                <div class=" py-3 flex justify-between ">
                    <button type="submit" wire:click="$toggle('show')"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Keluar</button>
                    <form action="{{ route('user.checkout') }}" method="">
                        @csrf
                        <button type="submit" @if (!$cart || count($cart) == 0) disabled @endif 
                            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 ml-3 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800  @if (!$cart || count($cart) == 0) opacity-50 cursor-not-allowed @endif">Checkout</button>
                    </form>

                </div>
            </div>

        </div>
    @endif


</div>