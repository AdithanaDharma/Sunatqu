<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <div class="max-w-6xl mx-auto py-10 px-4">
        <h2 class="text-2xl font-bold text-center mb-10">Pilih Paket Khitan</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($paket as $pakets)
                @if ($pakets->Populer)
                    <div class="border-2 border-green-700 rounded-lg p-6 text-center bg-green-50 shadow-md relative">
                        <div
                            class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-green-800 text-white text-xs px-3 py-1 rounded-full">
                            TERPOPULER
                        </div>
                        <h3 class="text-lg font-semibold mb-2">{{ $pakets->tipe_paket }}</h3>
                        <p class="text-2xl font-bold mb-4">Rp {{ number_format($pakets->harga, 0, ',', '.') }}</p>
                        <form action="{{ route('pilih-paket') }} " method="POST">
                            @csrf
                            <input type="hidden" name="paket_id" value="{{ $pakets->id }}" id="">
                            <button type="submit"
                                class="inline-block bg-green-800 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                                Pilih paket
                            </button>
                        </form>

                        <ul class="text-sm text-left mt-4 space-y-1 list-disc list-inside">
                            <li>Sunat Bius (Tanpa Jarum Suntik)</li>
                            <li>Obat (Gel Luka + Salep Oles)</li>
                            <li>Celana Sunat 2 Buah</li>
                            <li>Gratis kontrol sampai sembuh</li>
                        </ul>

                        <p class="mt-4 text-sm font-semibold">Bonus:</p>
                        <ul class="text-sm text-left list-disc list-inside">
                            <li>Mobil Remot / Drone</li>
                            <li>Foto + Bingkai</li>
                            <li>Goodie Bag</li>
                        </ul>
                    </div>
                @else
                    <div class="border rounded-lg p-6 text-center bg-white shadow-sm">
                        <h3 class="text-lg font-semibold mb-2">{{ $pakets->tipe_paket }}</h3>
                        <p class="text-2xl font-bold mb-4">Rp {{ number_format($pakets->harga, 0, ',', '.') }}</p>
                        <a href=""
                            class="inline-block bg-gray-200 hover:bg-gray-300 text-black font-semibold py-2 px-4 rounded">
                            Pilih paket
                        </a>

                        <ul class="text-sm text-left mt-4 space-y-1 list-disc list-inside">
                            <li>Sunat Bius (Tanpa Jarum Suntik)</li>
                            <li>Obat</li>
                            <li>Celana Sunat</li>
                        </ul>

                        <p class="mt-4 text-sm font-semibold">Bonus:</p>
                        <ul class="text-sm text-left list-disc list-inside">
                            <li>Mobil Remot</li>
                        </ul>
                    </div>

                @endif
            @endforeach
            {{-- Paket Reguler --}}
            {{-- <div class="border rounded-lg p-6 text-center bg-white shadow-sm">
                <h3 class="text-lg font-semibold mb-2">Reguler</h3>
                <p class="text-2xl font-bold mb-4">Rp 1.200.000</p>
                <a href=""
                    class="inline-block bg-gray-200 hover:bg-gray-300 text-black font-semibold py-2 px-4 rounded">
                    Pilih paket
                </a>

                <ul class="text-sm text-left mt-4 space-y-1 list-disc list-inside">
                    <li>Sunat Bius (Tanpa Jarum Suntik)</li>
                    <li>Obat</li>
                    <li>Celana Sunat</li>
                </ul>

                <p class="mt-4 text-sm font-semibold">Bonus:</p>
                <ul class="text-sm text-left list-disc list-inside">
                    <li>Mobil Remot</li>
                </ul>
            </div> --}}

            {{-- Paket Premium (Terpopuler) --}}
            {{-- <div class="border-2 border-green-700 rounded-lg p-6 text-center bg-green-50 shadow-md relative">
                <div
                    class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-green-800 text-white text-xs px-3 py-1 rounded-full">
                    TERPOPULER
                </div>
                <h3 class="text-lg font-semibold mb-2">Premium</h3>
                <p class="text-2xl font-bold mb-4">Rp 1.500.000</p>
                <a href=""
                    class="inline-block bg-green-800 hover:bg-green-900 text-white font-semibold py-2 px-4 rounded">
                    Pilih paket
                </a>

                <ul class="text-sm text-left mt-4 space-y-1 list-disc list-inside">
                    <li>Sunat Bius (Tanpa Jarum Suntik)</li>
                    <li>Obat (Gel Luka + Salep Oles)</li>
                    <li>Celana Sunat 2 Buah</li>
                    <li>Gratis kontrol sampai sembuh</li>
                </ul>

                <p class="mt-4 text-sm font-semibold">Bonus:</p>
                <ul class="text-sm text-left list-disc list-inside">
                    <li>Mobil Remot / Drone</li>
                    <li>Foto + Bingkai</li>
                    <li>Goodie Bag</li>
                </ul>
            </div> --}}

            {{-- Paket Eksklusif --}}
            {{-- <div class="border rounded-lg p-6 text-center bg-white shadow-sm">
                <h3 class="text-lg font-semibold mb-2">Eksklusif</h3>
                <p class="text-2xl font-bold mb-4">Rp 2.000.000</p>
                <a href=""
                    class="inline-block bg-gray-200 hover:bg-gray-300 text-black font-semibold py-2 px-4 rounded">
                    Pilih paket
                </a>

                <ul class="text-sm text-left mt-4 space-y-1 list-disc list-inside">
                    <li>Sunat Bius (Tanpa Jarum Suntik)</li>
                    <li>Obat Lengkap (Obat Super + Paket Lengkap)</li>
                    <li>Celana Sunat</li>
                    <li>Gratis kontrol sampai sembuh</li>
                </ul>

                <p class="mt-4 text-sm font-semibold">Bonus:</p>
                <ul class="text-sm text-left list-disc list-inside">
                    <li>Mobil Remot / Drone</li>
                    <li>Sertifikat Berpigura</li>
                    <li>Foto & Bingkai</li>
                    <li>Goodie Bag</li>
                </ul>
            </div> --}}

            {{-- Paket Khusus --}}
            {{-- <div class="border rounded-lg p-6 text-center bg-white shadow-sm">
                <h3 class="text-lg font-semibold mb-2">Paket Khusus<br><span class="text-sm font-normal">(Bayi, Gemuk,
                        dan Fimosis)</span></h3>
                <p class="text-2xl font-bold mb-4">Rp 1.750.000</p>
                <a href=""
                    class="inline-block bg-gray-200 hover:bg-gray-300 text-black font-semibold py-2 px-4 rounded">
                    Pilih paket
                </a>

                <ul class="text-sm text-left mt-4 space-y-1 list-disc list-inside">
                    <li>Sunat Bius (Tanpa Jarum Suntik)</li>
                    <li>Obat Lengkap (Obat Super + Paket Lengkap)</li>
                    <li>Celana Sunat</li>
                    <li>Gratis kontrol sampai sembuh</li>
                </ul>

                <p class="mt-4 text-sm font-semibold">Bonus:</p>
                <ul class="text-sm text-left list-disc list-inside">
                    <li>Mobil Remot / Drone</li>
                    <li>Foto & Bingkai</li>
                    <li>Goodie Bag</li>
                </ul>
            </div> --}}

        </div>
    </div>
</body>

</html>