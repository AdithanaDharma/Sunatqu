<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>
   
    <div class="container mx-auto py-10 px-4">
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h1 class="text-2xl font-bold text-center mb-6 text-green-600">
                ✅ Pesanan Berhasil Dibuat
            </h1>

            {{-- @php
                $pendaftaran_id = session('order_id');
                $pendaftaran = \App\Models\Order::find($pendaftaran_id);
                $transaction = \App\Models\Transaksi::where('order_id', $pendaftaran_id)->first();
            @endphp --}}

            @if($pendaftaran)
                <!-- Detail Pesanan -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-2">📦 Detail Pesanan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-gray-700">
                        <p><strong>ID Pesanan:</strong> {{ $pendaftaran->id }}</p>
                        <p><strong>Tanggal:</strong> {{ $pendaftaran->created_at->format('d M Y H:i') }}</p>
                        {{-- <p><strong>Total:</strong> Rp {{ number_format($pendaftaran->total, 0, ',', '.') }}</p>
                        <p><strong>Status:</strong> --}}
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-md">
                                {{ $transaction->status ?? 'menunggu' }}
                            </span>
                        </p>
                    </div>
                </div>

                <!-- Alamat Pengiriman -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-2">📍 Alamat Pengiriman</h2>
                    <div class="bg-gray-50 p-4 rounded-md text-gray-700">
                        <p><strong>{{ $pendaftaran->nama_anak }}</strong></p>
                        <p>{{ $pendaftaran->alamat }}</p>
                        <p>Telp: {{ $pendaftaran->no_whastapp }}</p>
                    </div>
                </div>

                <!-- Item Pesanan -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-2">🛍️ Daftar Produk</h2>
                    <table class="w-full border border-gray-200 rounded-md">
                        <thead>
                            <tr class="bg-gray-100 text-left text-gray-600">
                                <th class="p-2 border">Produk</th>
                                <th class="p-2 border">Jumlah</th>
                                <th class="p-2 border">Harga</th>
                                <th class="p-2 border">Subtotal</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                                <tr class="text-gray-700">
                                    <td class="p-2 border">
                                        {{ $product->nama ?? 'Produk #' . $item->product_id }}
                                    </td>
                                    <td class="p-2 border">{{ $item->quantity }}</td>
                                    <td class="p-2 border">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td class="p-2 border">
                                        Rp {{ number_format($item->harga * $item->quantity, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>

                <!-- Pembayaran -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-2">💳 Metode Pembayaran</h2>
                    <div class="bg-gray-50 p-4 rounded-md">
                        <p><strong>Metode:</strong> {{ strtoupper($transaction->mode ?? '-') }}</p>

                        @if($transaction->mode == 'transfer')
                            <p class="mt-2 text-sm text-gray-700">
                                Silakan selesaikan pembayaran melalui Midtrans dengan menekan tombol di bawah ini.
                            </p>
                            {{-- <form action="{{ route('midtrans.pay', ['order_id' => $pendaftaran->id]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="mt-3 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                                    Bayar Sekarang
                                </button>
                            </form> --}}
                        @elseif($transaction->mode == 'cod')
                            <p class="mt-2 text-sm text-gray-700">
                                Pesanan Anda akan dikirim dan dibayar di tempat (COD).
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="text-center">
                    <a href="{{ route('home') }}"
                       class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow">
                        Kembali ke Beranda
                    </a>
                </div>
            @else
                <div class="text-center text-gray-600">
                    <p>Pesanan tidak ditemukan atau sesi telah berakhir.</p>
                    <a href="{{ route('home') }}"
                       class="mt-4 inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow">
                        Kembali ke Beranda
                    </a>
                </div>
            @endif
        </div>
    </div>
 
</body>
</html>