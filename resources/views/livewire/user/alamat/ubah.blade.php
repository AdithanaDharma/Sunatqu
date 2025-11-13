<div>
    @if($show)
        <div class="fixed overflow-y-auto inset-0 bg-black/50 z-50 flex items-center justify-center">
            <div
                class="w-full max-w-3xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between  pb-4  rounded-t dark:border-gray-600 border-gray-200">
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">Ubah Alamat</h5>
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
                    <div class="grid gap-3 mb-2 md:grid-cols-2">
                        <div>
                            <label for="first_name"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input wire:model="nama" id="first_name" type="text" value="{{ $alamat->nama }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="nomer"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nomer</label>
                            <input wire:model="nomer" id="nomer" type="text" value="{{ $alamat->nomer }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div>
                            <label for="kota"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                            <input wire:model="kota" type='text' id="kota" value="{{ $alamat->kota }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="provensi"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Provensi</label>
                            <input wire:model="provinsi" type="text" id="provensi" value="{{ $alamat->provinsi }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>


                    </div>
                    <div class="mb-3">
                        <label for="alamat"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea wire.model="alamat" type="alamat" id="alamat" value="{{ $alamat->nomer }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $alamat->alamat }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Patokan"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Patokan</label>
                        <textarea wire:model="patokan" type="Patokan" id="Patokan" value="{{ $alamat->patokan }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $alamat->patokan }}</textarea>
                    </div>

                    <button type="submit" wire:click="$toggle('show')"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Keluar</button>
                    <button type="button" wire:click="update"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Simpan</button>
                </form>

            </div>
        </div>
    @endif
</div>