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

        $query = Kasabian_book::with(['relasi.kategori', 'ulasan']);

        if (!is_null($kategoriId) && $kategoriId != 'all') {
            $query->whereHas('relasi.kategori', function ($query) use ($kategoriId) {
                $query->where('kategoriId', $kategoriId);
            });
        }

        if (!is_null($searchQuery) && $searchQuery != '') {
            $query->where('kasabianJudul', 'like', '%' . $searchQuery . '%');
        }

        $kasabianBuku = $query->get();

        $kasabianBuku->each(function ($item) {

            $ratings = $item->ulasan;
            $ratingCount = $ratings->count();
            $ratingSum = $ratings->sum('rating');

            if ($ratingCount > 0) {
                $averageRating = round($ratingSum / $ratingCount, 1);
                $item->average_rating = $averageRating;
            } else {
                $item->average_rating = 0;
            }
        });

        // Return the view with the filtered data
        return view('peminjam.kasabianHome', [
            'dataBuku' => $kasabianBuku,
            'dataKategori' => $kasabianKategori,
        ]);
    }
}
