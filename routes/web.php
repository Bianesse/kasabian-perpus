<?php

use App\Http\Controllers\KasabianBookController;
use App\Http\Controllers\KasabianLoginController;
use App\Http\Controllers\kasabianUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/users', [kasabianUserController::class, 'index'])->name('users');

    Route::get('/buku', [KasabianBookController::class, 'index'])->name('book');
    Route::get('/buku/add', [KasabianBookController::class, 'tambahBukuPage'])->name('tambahBukuPage');
    Route::post('/buku/add', [KasabianBookController::class, 'tambahBuku'])->name('tambahBuku');
    Route::post('/buku/hapus/{id}', [KasabianBookController::class, 'hapusBuku'])->name('hapusBuku');
    Route::get('/buku/edit/{id}', [KasabianBookController::class, 'editBukuPage'])->name('editBukuPage');
    Route::post('/buku/edit/{id}', [KasabianBookController::class, 'editBuku'])->name('editBuku');

    Route::get('/kategori', [KasabianBookController::class, 'kategori'])->name('kategori');

    Route::post('/logout', [KasabianLoginController::class, 'logout'])->name('logout');
});

Route::middleware('logout')->group(function () {
    Route::post('/login', [KasabianLoginController::class, 'index'])->name('loginProcess');

    Route::get('/login', function () {
        return view('login.kasabianLogin');
    })->name('loginPage');
});
