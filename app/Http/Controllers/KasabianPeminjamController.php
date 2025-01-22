<?php

namespace App\Http\Controllers;

use App\Models\Kasabian_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasabianPeminjamController extends Controller
{
    public function home()
    {
        $kasabianBuku = Kasabian_book::with('relasi.kategori')->get();

        return view('peminjam.kasabianHome', ['dataBuku' => $kasabianBuku]);
    }
}
