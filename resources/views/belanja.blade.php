<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
    {{-- <x-app-layout> --}}
    <div class="bg-gray-100 min-h-screen">
        <!-- Navbar -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <div class="font-bold text-lg">LOGO</div>
                <nav class="space-x-6 text-sm font-medium">
                    <a href="#" class="text-gray-800 hover:text-green-600">Home</a>
                    <a href="#" class="text-gray-800 hover:text-green-600">Pendaftaran</a>
                    <a href="#" class="text-gray-800 hover:text-green-600">Produk</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="#" class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.6 8H19m-7-8V6m0 0L9 8m2-2l2 2" />
                        </svg>
                    </a>
                    <a href="#" class="font-semibold">PROFIL</a>
                </div>
            </div>
        </header>

        <!-- Filter Kategori -->
        <section class="max-w-7xl mx-auto px-6 py-6">
            <div class="flex items-center space-x-3 overflow-x-auto">
                <button class="p-2 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                @foreach (['Super Ring', 'Ring Meter', 'Celana Sunat', 'Madejet', 'Madejet'] as $kategori)
                    <button class="px-5 py-2 bg-white border border-gray-200 rounded-full shadow-sm text-gray-800 hover:bg-green-100">
                        {{ $kategori }}
                    </button>
                @endforeach
                <button class="p-2 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Banner -->
            <div class="mt-6 h-40 bg-white rounded-lg shadow-sm flex items-center justify-center text-gray-400">
                Banner / Slider Produk
            </div>
        </section>

        <!-- Rekomendasi Produk -->
        <section class="max-w-7xl mx-auto px-6 pb-12">
            <h2 class="text-gray-700 font-semibold mb-4">Rekomendasi Produk</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @php
                    $produk = [
                        ['nama' => 'Celana Sunat', 'kategori' => 'Celana Sunat', 'harga' => '25000', 'gambar' => 'https://via.placeholder.com/150'],
                        ['nama' => 'Super Ring V', 'kategori' => 'Super Ring V', 'harga' => '110000', 'gambar' => 'https://via.placeholder.com/150'],
                        ['nama' => 'Madejet Amerika', 'kategori' => 'Madejet', 'harga' => '25000000', 'gambar' => 'https://via.placeholder.com/150'],
                        ['nama' => 'Cutton Bud', 'kategori' => 'Cutton Bud', 'harga' => '12000', 'gambar' => 'https://via.placeholder.com/150'],
                        ['nama' => 'Celana Sunat', 'kategori' => 'Celana Sunat', 'harga' => '25000', 'gambar' => 'https://via.placeholder.com/150'],
                        ['nama' => 'Celana Sunat', 'kategori' => 'Celana Sunat', 'harga' => '25000', 'gambar' => 'https://via.placeholder.com/150'],
                    ];
                @endphp

                @foreach ($produk as $item)
                    <div class="bg-white rounded-xl shadow hover:shadow-md transition overflow-hidden">
                        <form action="">
                        <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" class="w-full h-40 object-cover">
                        <div class="p-3">
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-md font-semibold">
                                {{ $item['kategori'] }}
                            </span>
                            <h3 class="mt-2 font-semibold text-gray-800">{{ $item['nama'] }}</h3>
                            <p class="text-sm text-gray-600">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>
                            <button class="w-full mt-3 py-2 bg-gradient-to-r from-green-700 to-green-500 text-white rounded-lg font-semibold flex items-center justify-center space-x-2 hover:opacity-90">
                                <span>+</span>
                            </button>
                        </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
{{-- </x-app-layout> --}}

</body>
</html>