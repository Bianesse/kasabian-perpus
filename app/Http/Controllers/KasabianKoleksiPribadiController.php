<?php

namespace App\Http\Controllers;

use App\Models\KasabianKoleksiPribadi;
use App\Http\Requests\StoreKasabianKoleksiPribadiRequest;
use App\Http\Requests\UpdateKasabianKoleksiPribadiRequest;
use Illuminate\Support\Facades\Auth;

class KasabianKoleksiPribadiController extends Controller
{
    public function koleksiPribadi()
    {
        $kasabianUserId = Auth::user()->id;
        $kasabianKoleksi = KasabianKoleksiPribadi::with(['users', 'books.relasi.kategori'])->where('userId', $kasabianUserId)->get();
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
