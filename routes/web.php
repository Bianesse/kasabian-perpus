<?php

use App\Http\Controllers\KasabianLoginController;
use App\Http\Controllers\kasabianUserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [kasabianUserController::class, 'index']);
Route::post('/login', [KasabianLoginController::class, 'index']);

Route::get('/', function () {
    return view('login.kasabianLogin');
});
