<?php

use App\Http\Controllers\KasabianBookController;
use App\Http\Controllers\KasabianHomeController;
use App\Http\Controllers\KasabianLoginController;
use App\Http\Controllers\KasabianPeminjamController;
use App\Http\Controllers\KasabianPeminjamHome;
use App\Http\Controllers\kasabianUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [KasabianHomeController::class, 'index'])->name('main');

    //admin
    Route::middleware('role:1')->group(function () {
        //user
        Route::prefix('users')->group(function () {
            Route::get('/', [kasabianUserController::class, 'index'])->name('users');
            Route::get('/add', [KasabianUserController::class, 'tambahUsersPage'])->name('tambahUsersPage');
            Route::post('/add', [KasabianUserController::class, 'tambahUsers'])->name('tambahUsers');
            Route::post('/hapus/{id}', [KasabianUserController::class, 'hapusUsers'])->name('hapusUsers');
            Route::get('/edit/{id}', [KasabianUserController::class, 'editUsersPage'])->name('editUsersPage');
            Route::post('/edit/{id}', [KasabianUserController::class, 'editUsers'])->name('editUsers');
        });

        //buku
        Route::prefix('buku')->group(function () {
            Route::get('/', [KasabianBookController::class, 'index'])->name('book');
            Route::get('/add', [KasabianBookController::class, 'tambahBukuPage'])->name('tambahBukuPage');
            Route::post('/add', [KasabianBookController::class, 'tambahBuku'])->name('tambahBuku');
            Route::post('/hapus/{id}', [KasabianBookController::class, 'hapusBuku'])->name('hapusBuku');
            Route::get('/edit/{id}', [KasabianBookController::class, 'editBukuPage'])->name('editBukuPage');
            Route::post('/edit/{id}', [KasabianBookController::class, 'editBuku'])->name('editBuku');
        });

        //kategori
        Route::prefix('kategori')->group(function () {
            Route::get('/', [KasabianBookController::class, 'kategori'])->name('kategori');
            Route::get('/add', [KasabianBookController::class, 'tambahKategoriPage'])->name('tambahKategoriPage');
            Route::post('/add', [KasabianBookController::class, 'tambahKategori'])->name('tambahKategori');
            Route::post('/hapus/{id}', [KasabianBookController::class, 'hapusKategori'])->name('hapusKategori');
            Route::get('/edit/{id}', [KasabianBookController::class, 'editKategoriPage'])->name('editKategoriPage');
            Route::post('/edit/{id}', [KasabianBookController::class, 'editKategori'])->name('editKategori');
        });
    });

    Route::middleware('role:3')->group(function () {
        Route::prefix('peminjam')->group(function(){
            Route::get('/', [KasabianPeminjamController::class, 'home'])->name('peminjamHome');
            Route::get('/buku/{id}', [KasabianBookController::class, 'detail'])->name('bukuDetail');
        });
    });

    Route::post('/logout', [KasabianLoginController::class, 'logout'])->name('logout');
});

Route::middleware('logout')->group(function () {
    Route::post('/login', [KasabianLoginController::class, 'index'])->name('loginProcess');

    Route::get('/login', function () {
        return view('login.kasabianLogin');
    })->name('loginPage');
});
