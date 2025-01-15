<?php

use App\Http\Controllers\KasabianBookController;
use App\Http\Controllers\KasabianLoginController;
use App\Http\Controllers\kasabianUserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [kasabianUserController::class, 'index'])->name('users');
Route::get('/buku', [KasabianBookController::class, 'index'])->name('book');
Route::get('/kategori', [KasabianBookController::class, 'kategori'])->name('kategori');
Route::post('/login', [KasabianLoginController::class, 'index'])->name('loginProcess');

Route::get('/', function () {
    return view('login.kasabianLogin');
});
