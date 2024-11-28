<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard user biasa (dengan autentikasi)
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup rute untuk pengguna dengan middleware 'auth'
Route::middleware('auth')->group(function () {
    // Rute profil pengguna
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rute pengiriman untuk pengguna biasa (hanya melihat pengiriman)
    Route::get('/pengiriman', [PengirimanController::class, 'indexForUser'])->name('pengiriman.index');

    // Rute pemasok untuk pengguna (user hanya bisa melihat daftar pemasok dan menambah pemasok)
    Route::prefix('pemasok')->group(function () {
        Route::get('/', [PemasokController::class, 'index'])->name('pemasok.index'); // Menambahkan rute untuk melihat daftar pemasok
        Route::get('/create', [PemasokController::class, 'create'])->name('pemasok.create');
        Route::post('/', [PemasokController::class, 'store'])->name('pemasok.store');
    });

    // Rute kontrak (user hanya bisa melihat kontrak)
    Route::get('/kontrak', [KontrakController::class, 'index'])->name('kontrak.index');
});

// Grup rute admin dengan middleware 'auth' dan 'admin'
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Rute pengiriman untuk admin (CRUD)
    Route::resource('pengiriman', PengirimanController::class)->names([
        'index' => 'pengiriman.index',
        'create' => 'pengiriman.create',
        'store' => 'pengiriman.store',
        'edit' => 'pengiriman.edit',
        'update' => 'pengiriman.update',
        'destroy' => 'pengiriman.destroy',
    ]);

    // Rute pemasok untuk admin (CRUD lengkap)
    Route::resource('pemasok', PemasokController::class)->names([
        'index' => 'pemasok.index',
        'create' => 'pemasok.create',
        'store' => 'pemasok.store',
        'edit' => 'pemasok.edit',
        'update' => 'pemasok.update',
        'destroy' => 'pemasok.destroy',
    ]);

    // Rute kontrak untuk admin (CRUD lengkap)
    Route::resource('kontrak', KontrakController::class)->names([
        'index' => 'kontrak.index',
        'create' => 'kontrak.create',
        'store' => 'kontrak.store',
        'edit' => 'kontrak.edit',
        'update' => 'kontrak.update',
        'destroy' => 'kontrak.destroy',
    ]);
});

// Sertakan rute autentikasi
require __DIR__ . '/auth.php';
