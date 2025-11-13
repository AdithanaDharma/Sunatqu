<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiProdukController;
use App\Http\Middleware\adminmiddleware;
use App\Models\Order;
use App\Models\paket;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', function () {
    // $paket = paket::all();
    // dd($paket);
    return view('landingpage',[
        'paket' => paket::all()
    ]);
})->name('home');
// Route::get('/', [Controller::class, 'home'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('admin-dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin.dashboard');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');
});

//route guest
// Route::get('/daftar-sunat', function () {
//     return view('daftar');
// })->name('daftar-sunat');




//guest
Route::get('/belanja', [ProdukController::class, 'belanja'])->name('belanja');
Route::get('/daftar-sunat', [PendaftaranController::class, 'index'])->name('daftar-sunat');
Route::post('/daftar-from', [PendaftaranController::class, 'daftar'])->name('daftarfrom');
Route::get('/paket', [PendaftaranController::class, 'paketview'])->name('paket');
Route::post('/pilih_paket', [PendaftaranController::class, 'pilih_paket'])->name('pilih-paket');
Route::get('/chackout-sunat', [PendaftaranController::class, 'chackout_sunat'])->name('chackout-sunat');
Route::post('bayar', [PendaftaranController::class, 'bayar'])->name('bayar');
Route::get('/konfirmasi-pendaftaran', [PendaftaranController::class, 'konfirmasi_pendaftaran'])->name('konfirmasi-pendaftaran');


// Route::view('cart', 'user.keranjang')->name('keranjang');
//route dengan middleware
Route::middleware(['auth', 'usermiddleware', 'verified'])->group(function () {
    Route::get('checkout', [OrderController::class, 'checkout'])->name('user.checkout');
    Route::get('riwayat', [OrderController::class, 'riwayat'])->name('user.riwayat');
    // Route::view('checkout', 'user.checkout')->name('keranjang');
    Route::post('placeOrder', [TransaksiProdukController::class, 'place_order'])->name('bayar.belanja');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get(uri: 'admin-produk',);
    Route::get('/admin-produk-update/{id}', [ProdukController::class, 'update'])->name('admin.update.produk');
    Route::view('admin-produk', 'admin.produk')->name('admin.produk');
    Route::view('admin-produk-tambah', 'admin.tambah_produk')->name('admin.tambah.produk');
    Route::view('admin-pendaftaran', 'admin.pendaftaran')->name('admin.pendaftaran');
    // Route::view('admin-produk-update/{$id}', 'admin.update_produk')->name('admin.update.produk');
    Route::view('admin-pesanan', 'admin.pesanan')->name('admin.pesanan');
});
require __DIR__ . '/auth.php';
