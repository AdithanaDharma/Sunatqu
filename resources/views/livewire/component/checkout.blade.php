<div>
    {{-- @if ($show) --}}
    {{-- <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center"> --}}
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-6 ">
            <h1 class="text-lg font-semibold mb-4 text-gray-800">Pendaftaran sunat</h1>

            <form action="{{ route('bayar') }}" method="POST">
                @csrf
                <ul class="font-bold list-none">
                    <li class="border rounded-sm p-2 mb-2">{{ $data['nama_anak'] }}</li>
                    <li class="border rounded-sm p-2 mb-2">{{ $data['umur'] }}</li>
                    <li class="border rounded-sm p-2 mb-2">{{ $data['nama_orang_tua'] }}</li>
                    <li class="border rounded-sm p-2 mb-2">{{ $data['berat_badan'] }}</li>
                    <li class="border rounded-sm p-2 mb-2">{{ $data['nama_anak'] }}</li>
                </ul>
                <div
                    class="border border-gray-200 rounded-lg p-4 flex justify-between items-center mb-6 hover:border-green-500 transition">

                    <label class="flex items-center gap-3 w-full cursor-pointer">
                        <input type="radio" name="package" value="premium" checked
                            class="text-green-600 focus:ring-green-600">
                        <div class="flex justify-between items-center w-full">
                            <span class="font-medium text-gray-800">{{ $paket->tipe_paket }}</span>
                            <span class="font-semibold text-gray-900">Rp
                                {{ number_format($paket->harga, 0, ',', '.') }}</span>
                        </div>
                    </label>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-700">Total</span>
                        <span class="text-lg font-semibold text-gray-900">Rp
                            {{ number_format($paket->harga, 0, ',', '.') }}</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Dengan menyelesaikan pembayaran, Anda menyetujui
                        <a href="#" class="text-green-600 underline">Syarat dan Ketentuan</a> kami.
                    </p>
                </div>
                <div class="mb-5 flex justify-end">
                    <select name="mode" id="" class="rounded-xl">
                        <option value="transfer">Transfer</option>
                        <option value="cash">cash</option>
                    </select>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('daftar-sunat') }}"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-green-700 hover:bg-green-800 text-white text-sm font-medium px-5 py-2 rounded-lg shadow">
                        Bayar
                    </button>
                </div>
            </form>
        </div>
        {{--
    </div> --}}
    {{-- @endif --}}

</div>