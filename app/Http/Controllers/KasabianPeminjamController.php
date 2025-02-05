<?php

namespace App\Http\Controllers;

use App\Models\Kasabian_book;
use App\Models\KasabianKategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasabianPeminjamController extends Controller
{
    public function home(Request $request)
    {
        $kategoriId = $request->kategoriId;
        $kasabianKategori = KasabianKategoriBuku::get();

        if (is_null($kategoriId)) {
            $kasabianBuku = Kasabian_book::with(['relasi.kategori'])->get();
        } elseif ($kategoriId != 'all') {
            $kasabianBuku = Kasabian_book::with(['relasi.kategori'])->whereHas('relasi.kategori', function ($query) use ($kategoriId) {
                $query->where('kategoriId', $kategoriId);
            })->get();
        } else {
            $kasabianBuku = Kasabian_book::with(['relasi.kategori'])->get();
        }

        return view('peminjam.kasabianHome', ['dataBuku' => $kasabianBuku, 'dataKategori' => $kasabianKategori]);
    }
}
