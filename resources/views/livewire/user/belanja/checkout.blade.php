<div>
  @livewire('user.alamat.ubah')

  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 ">
    <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8">
      <!-- Alamat Pengiriman -->
      <section class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-green-600 mt-1" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"></path>
            </svg>
            <div>
              <h3 class="font-semibold text-gray-900 mb-2">
                Alamat Pengiriman
              </h3>
              <p class="font-bold text-gray-900">{{ $alamat->nama }}</p>
              <p class="font-bold text-gray-900">{{ $alamat->nomer }}</p>
              <p class="text-gray-600 text-sm mt-1 leading-relaxed">
                {{ $alamat->alamat }}<br />
                {{ $alamat->kota }}, {{ $alamat->provinsi }}
              </p>
            </div>
          </div>
          <div class="flex gap-2">
            <button class="px-3 sm:px-4 py-1.5 text-xs sm:text-sm border border-gray-300 rounded hover:bg-gray-50">
              Utama
            </button>
            <button wire:click="ubah"
              class="px-3 sm:px-4 py-1.5 text-xs sm:text-sm border border-gray-300 rounded hover:bg-gray-50">
              Ubah
            </button>
          </div>
        </div>
      </section>
      <form action="{{ route('bayar.belanja') }}" method="POST">
        @csrf
        <!-- Produk Dipesan -->
        <section class="border-t border-gray-200 pt-6">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
              @foreach ($cart as $item)
                <tr
                  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <td class="p-4">
                    <img src="{{ asset('storage/' . $item[0]['gambar']) }}"
                      class="w-10 md:w-10 rounded-md max-w-full max-h-full" alt="Gambar Produk">
                  </td>
                  <td class="px-6 py-2 font-semibold text-center text-gray-900 dark:text-white">
                    {{ $item[0]['nama'] }}
                  </td>
                  <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                    {{ $item['qty'] }}
                  </td>
                  <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                    Rp {{ number_format($item[0]['harga'] ?? 0, 0, ',', '.') }}
                  </td>
                  <td class="px-6 py-2 font-semibold text-gray-900 dark:text-white">
                    Rp
                    {{ number_format($item[0]['harga'] * $item['qty'], 0, ',', '.') }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <!-- Total -->
          <div class="mt-6 flex justify-end">
            <div class="text-right">
              <p class="text-sm text-gray-600">Total Pesanan</p>
              <p class="text-xl font-bold text-gray-900">Rp 50.000</p>
            </div>
          </div>
        </section>

        <!-- Opsi Pengiriman -->
        {{-- <section class="py-6 border-t border-gray-200">
          <div class="flex flex-col sm:flex-row justify-between gap-2">
            <h3 class="font-semibold text-gray-900">Opsi Pengiriman</h3>
            <div class="flex items-center gap-3 text-sm sm:text-base">
              <span class="text-red-600 font-medium">J&T Standar</span>
              <span class="font-semibold text-gray-900">Rp15.000</span>
            </div>

          </div>
        </section> --}}

        <!-- Metode Pembayaran -->
        <section class="py-6 border-t border-gray-200">
          <h3 class="font-semibold mb-4">Metode Pembayaran</h3>
          <div class="flex flex-wrap gap-3">
            <select name="mode" id="">
              <option value="transfer">Transfer</option>
              <option value="cod">Cod</option>
            </select>
          </div>
        </section>

        <!-- Ringkasan Pembayaran -->
        <section class="pt-6 border-t border-gray-200">
          <div class="flex flex-col gap-3 text-sm sm:text-base mb-6">
            <div class="flex justify-between">
              <span>Subtotal Produk</span><span>Rp 150.000</span>
            </div>
            <div class="flex justify-between">
              <span>Ongkir</span><span>Rp 15.000</span>
            </div>
            <div class="flex justify-between">
              <span>Biaya Layanan</span><span>Rp 1.000</span>
            </div>
            <div class="flex justify-between pt-3 border-t border-gray-200 font-semibold text-gray-900">
              <span>Total Pembayaran</span><span class="text-lg sm:text-xl font-bold">Rp 166.000</span>
            </div>
          </div>

          <div class="flex ">
            <button type="submit"
              class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-green-900 transition">
              Buat Pesanan
            </button>
          </div>
        </section>
    </div>
  </div>
  </form>

</div>