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
    $searchQuery = $request->kasabianSearch;
    $kasabianKategori = KasabianKategoriBuku::get();

    $query = Kasabian_book::with(['relasi.kategori']);

    if (!is_null($kategoriId) && $kategoriId != 'all') {
        $query->whereHas('relasi.kategori', function ($query) use ($kategoriId) {
            $query->where('kategoriId', $kategoriId);
        });
    }

    if (!is_null($searchQuery) && $searchQuery != '') {
        $query->where('kasabianJudul', 'like', '%' . $searchQuery . '%');
    }

    $kasabianBuku = $query->get();

    // Return the view with the filtered data
    return view('peminjam.kasabianHome', [
        'dataBuku' => $kasabianBuku, 
        'dataKategori' => $kasabianKategori
    ]);
}

}
