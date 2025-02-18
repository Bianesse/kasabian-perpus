<?php

namespace App\Http\Controllers;

use App\Models\KasabianKoleksiPribadi;
use App\Http\Requests\StoreKasabianKoleksiPribadiRequest;
use App\Http\Requests\UpdateKasabianKoleksiPribadiRequest;
use App\Models\Kasabian_book;
use Illuminate\Support\Facades\Auth;

class KasabianKoleksiPribadiController extends Controller
{
    public function koleksiPribadi()
    {
        $kasabianUserId = Auth::user()->id;
        $kasabianKoleksi = KasabianKoleksiPribadi::with(['users', 'books.relasi.kategori','books.ulasan'])->where('userId', $kasabianUserId)->get();

        $kasabianKoleksi->each(function ($item) {

            $ratings = $item->books->ulasan;
            $ratingCount = $ratings->count();
            $ratingSum = $ratings->sum('rating');

            if ($ratingCount > 0) {
                $averageRating = round($ratingSum / $ratingCount, 1);
                $item->average_rating = $averageRating;
            } else {
                $item->average_rating = 0;
            }
        });
        return view('peminjam.kasabianKoleksiPribadi', ['dataKoleksi' => $kasabianKoleksi]);
    }

    public function tambahKoleksi($id)
    {

        $kasabianUserId = Auth::user()->id;
        $kasabianKoleksi = KasabianKoleksiPribadi::where('userId', $kasabianUserId)->where('bukuId', $id)->first();

        if(is_null($kasabianKoleksi)){
            KasabianKoleksiPribadi::create([
                'userId' => $kasabianUserId,
                'bukuId' => $id,
            ]);
        }else{
            $kasabianKoleksi->delete();
        }



        return redirect()->route('koleksiPribadi');
    }
}
