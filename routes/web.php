<?php

use App\Http\Controllers\PendaftaranController;
use App\Http\Middleware\adminmiddleware;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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


Route::get('/daftar-sunat', [PendaftaranController::class, 'index'])->name('daftar-sunat');
Route::post('/daftar-from', [PendaftaranController::class, 'daftar'])->name('daftarfrom');
Route::get('/paket', [PendaftaranController::class, 'paketview'])->name('paket');
Route::post('/pilih_paket', [PendaftaranController::class, 'pilih_paket'])->name('pilih-paket');
Route::get('/chackout-sunat', [PendaftaranController::class, 'chackout_sunat'])->name('chackout-sunat');
Route::post('bayar', [PendaftaranController::class, 'bayar'])->name('bayar');
Route::get('/konfirmasi-pendaftaran', [PendaftaranController::class, 'konfirmasi_pendaftaran'])->name('konfirmasi-pendaftaran');



//route dengan middleware
Route::middleware(['auth', 'usermiddleware'])->group(function () {

});
Route::middleware(['auth', 'adminmiddleware'])->group(function () {

});
require __DIR__ . '/auth.php';
