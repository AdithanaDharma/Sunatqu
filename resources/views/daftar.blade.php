<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 mt-10">
        @session('error')
        <p class="text-red-500 justify-center">{{ $value }}</p>
        @endsession
        <h2 class="text-2xl font-semibold text-center mb-6">Form Pendaftaran Khitan</h2>

        <form action="{{ route('daftarfrom') }}" method="POST">
            @csrf

            <!-- Nama Anak -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nama Anak</label>
                <input type="text" name="nama_anak" value="{{ old('nama_anak') }}"
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required>
                @error('nama_anak')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Umur -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Umur</label>
                <input type="number" name="umur" value="{{ old('umur') }}"
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required>
                @error('umur')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>


            <!-- Berat Badan -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Berat Badan (kg)</label>
                <input type="number" step="0.1" value="{{ old('berat_badan') }}" name="berat_badan"
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required>

                @error('berat_badan')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Nama Orang Tua -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Nama Orang Tua</label>
                <input type="text" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}"
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required>

                @error('nama_orang_tua')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Nomor WhatsApp -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">No WhatsApp</label>
                <input type="text" name="no_whatsapp"
                    value="{{ old('no_whatsapp') }}" class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required>
                @error('no_whatsapp')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Alamat</label>
                <textarea name="alamat" rows="3" value="{{ old('alamat') }}" class="w-full border rounded-md p-2 focus:ring focus:ring-green-300"
                    required></textarea>

                @error('alamat')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Jadwal Khitan -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Jadwal Khitan</label>
                <input type="date" name="jadwal_khitan" value="{{ old('jadwal_khitan') }}"
                    class="w-full border rounded-md p-2 focus:ring focus:ring-green-300" required>

                @error('jadwal_khitan')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Waktu -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-1">Waktu</label>
                <input type="time" name="waktu" value="{{ old('waktu') }}" class="w-full border rounded-md p-2 focus:ring focus:ring-green-300"
                    required>

                @error('waktu')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full bg-green-700 hover:bg-green-800 text-white font-semibold py-2 rounded-md">
                Lanjutkan
            </button>
        </form>
    </div>
</body>

</html>