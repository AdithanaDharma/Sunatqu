<x-layouts.guest :title="__('Paket')">
    @livewire('component.step')
    <div class="max-w-6xl mx-auto py-2 px-4">
        {{-- <h2 class="text-2xl font-bold text-center mb-10">Pilih Paket Khitan</h2> --}}
        <div class="pt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($paket as $pakets)
                @if ($pakets->Populer)
                    <div class="package-card relative bg-white rounded-2xl overflow-visible flex flex-col cursor-pointer border-2 border-[#375534] shadow-2xl bg-gradient-to-b from-white to-gray-50 transition-all duration-300 hover:shadow-2xl hover:scale-[1.02] md:hover:scale-105 pt-8 sm:pt-10 md:pt-12"
                        data-package="premium" data-terpopuler="true">
                        <!-- Label TERPOPULER -->
                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-gradient-to-r from-[#0F2A1D] to-[#375534] text-white text-xs sm:text-sm font-bold px-3 sm:px-4 py-1 sm:py-1.5 rounded-full shadow-md whitespace-nowrap z-10">
                            TERPOPULER
                        </div>

                        <!-- Header -->
                        <div
                            class="package-header bg-white p-4 sm:p-5 md:p-6 text-center border-b border-gray-200 rounded-t-2xl transition-all duration-300">
                            <h3 class="text-xl sm:text-2xl font-extrabold text-[#344E41]">
                                {{ $pakets->tipe_paket }}
                            </h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-500">
                                Pilihan terbaik untuk kenyamanan maksimal
                            </p>
                        </div>

                        <!-- Isi -->
                        <div class="px-4 sm:px-5 md:px-6 pb-6 sm:pb-7 md:pb-8 flex-grow flex flex-col">
                            <div class="mb-4 sm:mb-5 text-center">
                                <span class="text-xs sm:text-sm text-gray-600">Rp</span>
                                <span class="text-3xl sm:text-4xl font-extrabold text-[#2d5f4f]">
                                    {{ number_format($pakets->harga, 0, ',', '.') }}</span>
                            </div>

                            <!-- Tombol -->
                            <form action="{{ route('pilih-paket') }} " method="POST">
                                @csrf
                                <input type="hidden" name="paket_id" value="{{ $pakets->id }}" id="">
                                <button type="submit"
                                    class="select-btn w-full py-2.5 sm:py-3 bg-gradient-to-r from-[#0F2A1D] to-[#375534] text-white text-sm sm:text-base font-semibold rounded-lg shadow-md hover:shadow-xl hover:scale-[1.03] transition-all duration-300 mb-5 sm:mb-6">
                                    Pilih Paket
                                </button>
                            </form>

                            <!-- Fasilitas -->
                            <ul class="space-y-2 sm:space-y-2.5 mb-5 sm:mb-6 pb-5 sm:pb-6 border-b border-gray-200">
                                @foreach ($pakets->deskripsi as $item)
                                    <li class="text-xs sm:text-sm text-gray-800 pl-5 relative leading-relaxed">
                                        <span
                                            class="absolute left-0 font-bold text-base sm:text-lg text-secondary">•</span>{{$item}}
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Bonus -->
                            <div>
                                <h4 class="text-xs sm:text-sm font-bold mb-2 sm:mb-3 text-gray-900">
                                    Bonus:
                                </h4>
                                <ul class="space-y-1.5 sm:space-y-2">
                                    @foreach ($pakets->bonus as $item)
                                        <li class="text-xs sm:text-sm text-gray-800 pl-5 relative leading-relaxed">
                                            <span
                                                class="absolute left-0 font-bold text-base sm:text-lg text-secondary">•</span>{{$item}}
                                        </li>
                                    @endforeach

                                    {{-- <li class="text-xs sm:text-sm text-gray-800 pl-5 relative leading-relaxed">
                                        <span class="absolute left-0 font-bold text-base sm:text-lg text-secondary">•</span>Foto
                                        + Bingkai
                                    </li>
                                    <li class="text-xs sm:text-sm text-gray-800 pl-5 relative leading-relaxed">
                                        <span
                                            class="absolute left-0 font-bold text-base sm:text-lg text-secondary">•</span>Goodie
                                        Bag
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="border-2 border-green-700 rounded-lg p-6 text-center bg-green-50 shadow-md relative">
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
                    </div> --}}
                @else
                    {{-- <div class="border rounded-lg p-6 text-center bg-white shadow-sm">
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
                    </div> --}}

                    <div
                        class="package-card bg-white shadow-md rounded-2xl overflow-hidden flex flex-col cursor-pointer border border-gray-200 hover:shadow-lg transition-all duration-300 hover:scale-[1.02] md:hover:scale-105">
                        <div
                            class="package-header bg-white p-4 sm:p-5 text-center border-b border-gray-100 transition-all duration-300">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900">
                                {{ $pakets->tipe_paket }}
                            </h3>
                        </div>
                        <div class="px-4 sm:px-5 md:px-6 pb-5 sm:pb-6 flex-grow flex flex-col">
                            <div class="mb-4 sm:mb-5 text-center">
                                <span class="text-xs sm:text-sm text-gray-600">Rp</span>
                                <span
                                    class="text-2xl sm:text-3xl font-bold text-gray-900">{{ number_format($pakets->harga, 0, ',', '.') }}</span>
                            </div>

                            <form action="{{ route('pilih-paket') }} " method="POST">
                                @csrf
                                <input type="hidden" name="paket_id" value="{{ $pakets->id }}" id="">
                                <button type="submit"
                                    class="select-btn w-full py-2.5 sm:py-3 border-2 border-gray-300 text-gray-800 text-sm sm:text-base font-semibold rounded-lg transition-all duration-300 hover:-translate-y-0.5 hover:shadow-md mb-5 sm:mb-6">
                                    Pilih Paket
                                </button>
                            </form>
                            <ul class="space-y-2 sm:space-y-2.5 mb-5 sm:mb-6 pb-5 sm:pb-6 border-b border-gray-200">
                                @foreach ($pakets->deskripsi as $item)
                                    <li class="text-xs sm:text-sm text-gray-800 pl-5 relative leading-relaxed">
                                        <span
                                            class="absolute left-0 font-bold text-base sm:text-lg text-secondary">•</span>{{$item}}
                                    </li>
                                @endforeach
                            </ul>

                            <div>
                                <h4 class="text-xs sm:text-sm font-bold mb-2 sm:mb-3 text-gray-900">
                                    Bonus:
                                </h4>
                                <ul class="space-y-1.5 sm:space-y-2">
                                    @foreach ($pakets->bonus as $item)
                                        <li class="text-xs sm:text-sm text-gray-800 pl-5 relative leading-relaxed">
                                            <span
                                                class="absolute left-0 font-bold text-base sm:text-lg text-secondary">•</span>{{$item}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach

        </div>
    </div>
</x-layouts.guest>