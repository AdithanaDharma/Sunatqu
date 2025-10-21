<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-6 mt-10">
        <h1 class="text-lg font-semibold mb-4 text-gray-800">Pilih Paket Terbaikmu</h1>

        <form action="{{ route('bayar') }}" method="POST">
            @csrf
            <ul class="font-bold list-none">
                <li class="border p-2 mb-1">{{ $data['nama_anak'] }}</li>
                <li class="border p-2 mb-1">{{ $data['umur'] }}</li>
                <li class="border p-2 mb-1">{{ $data['nama_orang_tua'] }}</li>
                <li class="border p-2 mb-1">{{ $data['berat_badan'] }}</li>
                <li class="border p-2 mb-1">{{ $data['nama_anak'] }}</li>
            </ul>
            <div
                class="border border-gray-200 rounded-lg p-4 flex justify-between items-center mb-6 hover:border-green-500 transition">

                <label class="flex items-center gap-3 w-full cursor-pointer">
                    <input type="radio" name="package" value="premium" checked
                        class="text-green-600 focus:ring-green-600">
                    <div class="flex justify-between items-center w-full">
                        <span class="font-medium text-gray-800">Paket Premium</span>
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
            <div>
                <select name="mode" id="">
                    <option value="transfer">Transfer</option>
                    <option value="cash">cash</option>
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('daftar-sunat') }}" class="text-gray-600 text-sm font-medium hover:underline">
                    Batal
                </a>
                <button type="submit"
                    class="bg-green-700 hover:bg-green-800 text-white text-sm font-medium px-5 py-2 rounded-lg shadow">
                    Pilih Metode Pembayaran
                </button>
            </div>
        </form>
    </div>
</body>
    @if(isset($snapToken))
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <script type="text/javascript">

            window.onload = function (e) {
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function (result) {
                        // Redirect setelah sukses

                        window.location.href = "{{ route('konfirmasi-pendaftaran') }}";
                    },
                    onPending: function (result) {
                        // Redirect juga jika pending

                    },
                    onError: function (result) {
                        alert("Pembayaran gagal. Silakan coba lagi.");
                        window.location.href = "{{ route('daftar-sunat') }}";
                    }
                });
            };
        </script>
    @endif

</html>