<x-layouts.guest :title="__('Daftar-Sunat')">

    @session('error')
        <p class="text-red-500 justify-center">{{ $value }}</p>
    @endsession
    @livewire('component.step')

    <div class="max-w-5xl mx-auto border border-gray-200 bg-white shadow-xl rounded-xl p-5 mt-10 mb-20">
        <div
            class="flex flex-col md:flex-row items-center bg-white rounded-lg overflow-hidden md:max-w-6xl mx-auto dark:bg-gray-800 ">

            <!-- BAGIAN GAMBAR -->
            <div class="w-full md:w-1/2 h-96 md:h-auto flex items-center">
                <h1 class="absolute px-10 mb-4 text-4xl font-bold tracking-tight text-white dark:text-white">
                    Selamat datang di sunatqu <br>
                    <span class="text-2xl">Silahkan masukan data anak anda </span>
                </h1>
                {{-- <h1 class="absolute px-10 mb-4 text-2xl font-bold tracking-tight text-white dark:text-white">

                </h1> --}}
                <img src="{{ asset('storage/aset/IMG_6445.JPG') }}" alt="Gambar Khitan"
                    class="object-cover w-full h-full">
            </div>

            <!-- BAGIAN FORM -->
            <div class="w-full md:w-1/2 flex flex-col justify-between p-4 md:p-10 leading-normal">
                <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Form Pendaftaran Khitan
                </h5>

                <form action="{{ route('daftarfrom') }}" method="POST">
                    @csrf

                    <!-- Nama Anak -->
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            anak</label>
                        <input type="text" id="nama" name="nama_anak" value="{{ old('nama_anak') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                            placeholder="masukan nama" required />

                        {{-- <label class="block text-gray-700 font-medium mb-1">Nama Anak</label>
                        <input type="text" name="nama_anak" value="{{ old('nama_anak') }}"
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required> --}}
                        @error('nama_anak')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Umur -->
                    <div class="mb-4">
                        <label for="umur"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                        <input type="number" id="umur" name="umur" value="{{ old('umur') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                            placeholder="masukan umur" required />
                        {{-- <label class="block text-gray-700 font-medium mb-1">Umur</label>
                        <input type="number" name="umur" value="{{ old('umur') }}"
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required> --}}
                        @error('umur')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Berat Badan -->
                    <div class="mb-4">
                        <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                            badan (kg)</label>
                        <input type="number" step="0.1" value="{{ old('berat_badan') }}" name="berat_badan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                            placeholder="masukan umur" required />

                        {{-- <label class="block text-gray-700 font-medium mb-1">Berat Badan (kg)</label>
                        <input type="number" step="0.1" value="{{ old('berat_badan') }}" name="berat_badan" --}} {{--
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required> --}}
                        @error('berat_badan')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Nama Orang Tua -->
                    <div class="mb-4">
                        <label for="nama_orang_tua"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Orang Tua</label>
                        <input type="text" id="nama_orang_tua" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                            placeholder="masukan nama orang tua" required />

                        {{-- <label class="block text-gray-700 font-medium mb-1">Nama Orang Tua</label>
                        <input type="text" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}"
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required> --}}
                        @error('nama_orang_tua')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror

                    </div>


                    <!-- Nomor WhatsApp -->
                    <div class="mb-4">
                        {{-- <label class="block text-gray-700 font-medium mb-1">No WhatsApp</label>
                        <input type="text" name="no_whatsapp" value="{{ old('no_whatsapp') }}"
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required> --}}

                        <label for="phone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            WhatsApp:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                                    <path
                                        d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z" />
                                </svg>
                            </div>
                            <input type="text" name="no_whatsapp" value="{{ old('no_whatsapp') }}" id="phone-input"
                                aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                                  placeholder="123-456-7890" required />
                            @error('no_whatsapp')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">

                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="alamat" id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-[#375534] focus:border-[#375534] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                            placeholder="masukan alamat">{{ old('alamat') }}</textarea>

                        {{-- <label class="block text-gray-700 font-medium mb-1">Alamat</label>
                        <textarea name="alamat" rows="3"
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300"
                            required>{{ old('alamat') }}</textarea> --}}
                        @error('alamat')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Jadwal Khitan -->
                    <div class="mb-4">
                        <label for="jadwal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal
                            Khitan</label>
                        <input  type="date" name="jadwal_khitan"
                            value="{{ old('jadwal_khitan') }}" id="jadwal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                            placeholder="masukan nama orang tua" required />
                        {{-- <div class="relative ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker id="default-datepicker" type="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]"
                                placeholder="Select date">
                        </div> --}}
                        {{-- <label class="block text-gray-700 font-medium mb-1">Jadwal Khitan</label>
                        <input type="date" name="jadwal_khitan" value="{{ old('jadwal_khitan') }}"
                            class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required> --}}
                        @error('jadwal_khitan')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Waktu -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-1">Waktu</label>
                        <input step="3600" type="time" name="waktu" value="{{ old('waktu') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#375534] focus:border-[#375534] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#375534] dark:focus:border-[#375534]" required>
                        @error('waktu')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit"
                        class="w-full bg-[#375534] hover:bg-[#0F2A1D] text-white font-semibold py-2 rounded-md transition">
                        Lanjutkan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>