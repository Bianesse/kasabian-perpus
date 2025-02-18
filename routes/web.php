<?php

use App\Http\Controllers\KasabianBookController;
use App\Http\Controllers\KasabianHomeController;
use App\Http\Controllers\KasabianKoleksiPribadiController;
use App\Http\Controllers\KasabianLoginController;
use App\Http\Controllers\KasabianLogPeminjamanController;
use App\Http\Controllers\KasabianPeminjamanController;
use App\Http\Controllers\KasabianPeminjamController;
use App\Http\Controllers\KasabianPeminjamHome;
use App\Http\Controllers\KasabianUlasanBukuController;
use App\Http\Controllers\kasabianUserController;
use Illuminate\Support\Facades\Route;

Route::get('/peminjam', [KasabianPeminjamController::class, 'home'])->name('peminjamHome');
Route::post('/peminjam', [KasabianPeminjamController::class, 'home'])->name('peminjamHome');
Route::get('/buku/{id}', [KasabianBookController::class, 'detail'])->name('bukuDetail');

Route::get('/', [KasabianHomeController::class, 'index'])->name('main');

Route::middleware('auth')->group(function () {
    

    //admin
    Route::middleware('role:1')->group(function () {
        //user
        Route::prefix('users')->group(function () {
            Route::post('/add', [KasabianUserController::class, 'tambahUsers'])->name('tambahUsers');
            Route::post('/hapus/{id}', [KasabianUserController::class, 'hapusUsers'])->name('hapusUsers');
            Route::post('/edit/{id}', [KasabianUserController::class, 'editUsers'])->name('editUsers');
        });

        //buku
        Route::prefix('buku')->group(function () {
            Route::post('/add', [KasabianBookController::class, 'tambahBuku'])->name('tambahBuku');
            Route::post('/hapus/{id}', [KasabianBookController::class, 'hapusBuku'])->name('hapusBuku');
            Route::post('/edit/{id}', [KasabianBookController::class, 'editBuku'])->name('editBuku');
        });

        //kategori
        Route::prefix('kategori')->group(function () {
            Route::post('/add', [KasabianBookController::class, 'tambahKategori'])->name('tambahKategori');
            Route::post('/hapus/{id}', [KasabianBookController::class, 'hapusKategori'])->name('hapusKategori');
            Route::post('/edit/{id}', [KasabianBookController::class, 'editKategori'])->name('editKategori');
        });
    });

    Route::middleware('role:1,2')->group(function () {
        Route::get('/dashboard', [KasabianHomeController::class, 'dashboard'])->name('dashboard');
        Route::post('/dashboard', [KasabianHomeController::class, 'dashboard'])->name('showLogFilter');
        Route::prefix('users')->group(function () {
            Route::get('/', [kasabianUserController::class, 'index'])->name('users');
        });

        Route::prefix('buku')->group(function () {
            Route::get('/', [KasabianBookController::class, 'index'])->name('book');
        });

        Route::prefix('kategori')->group(function () {
            Route::get('/', [KasabianBookController::class, 'kategori'])->name('kategori');
        });

        Route::prefix('peminjaman')->group(function () {
            Route::get('/', [KasabianPeminjamanController::class, 'adminDisplayPinjam'])->name('adminPeminjaman');
            Route::post('/pinjam/{id}', [KasabianPeminjamanController::class, 'adminKonfirmasiPinjam'])->name('adminKonfirmasiPeminjaman');
        });

        /* Route::prefix('log')->group(function () {
            Route::get('/', [KasabianLogPeminjamanController::class, 'showLog'])->name('showLog');
            Route::post('/', [KasabianLogPeminjamanController::class, 'showLog'])->name('showLogFilter');
        }); */
    });

    Route::middleware('role:3')->group(function () {
        Route::prefix('peminjam')->group(function () {
            Route::get('/pinjam', [KasabianPeminjamanController::class, 'displayPinjam'])->name('displayPinjam');
            Route::get('/pinjam/{id}', [KasabianPeminjamanController::class, 'pinjamPage'])->name('pinjamPage');
            Route::post('/pinjam/{id}', [KasabianPeminjamanController::class, 'pinjamBuku'])->name('pinjamBuku');
            Route::post('/kembalikan/{id}', [KasabianPeminjamanController::class, 'kembalikanBuku'])->name('kembalikanBuku');

            Route::get('/koleksi', [KasabianKoleksiPribadiController::class, 'koleksiPribadi'])->name('koleksiPribadi');
            Route::post('/koleksi/{id}', [KasabianKoleksiPribadiController::class, 'tambahKoleksi'])->name('tambahKoleksi');

            Route::post('/ulasan/{id}', [KasabianUlasanBukuController::class, 'tambahUlasan'])->name('tambahUlasan');
        });
    });

    Route::post('/logout', [KasabianLoginController::class, 'logout'])->name('logout');
});

Route::middleware('logout')->group(function () {
    Route::post('/login', [KasabianLoginController::class, 'index'])->name('loginProcess');
    /* Route::get('/register', [KasabianLoginController::class, 'register'])->name('registerPage'); */
    Route::post('/register', [KasabianLoginController::class, 'registerProcess'])->name('registerProcess');

    /* Route::get('/login', function () {
        return view('login.kasabianLogin');
    })->name('loginPage'); */
});
