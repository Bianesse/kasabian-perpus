<?php

namespace App\Http\Controllers;

use App\Models\KasabianPeminjaman;
use App\Http\Requests\StoreKasabianPeminjamanRequest;
use App\Http\Requests\UpdateKasabianPeminjamanRequest;
use App\Models\Kasabian_book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KasabianPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function displayPinjam()
    {
        $kasabianUserId = Auth::user()->id;
        $kasabianPeminjaman = KasabianPeminjaman::with(['users', 'books'])->where('userId', $kasabianUserId)->get();

        return view('peminjam.kasabianDisplayPeminjaman', ['dataPeminjaman' => $kasabianPeminjaman]);
    }

    public function pinjamPage($id)
    {
        $kasabianBuku = Kasabian_book::find($id);

        return view('peminjam.kasabianMinjamPage', ['dataBuku' => $kasabianBuku]);
    }

    public function pinjamBuku(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kasabianPeminjamId' => 'required',
            'kasabianBukuId' => 'required',
            'kasabianTanggalPeminjaman' => 'required',
            'kasabianTanggalPengembalian' => 'required',
        ]);

        $kasabianPeminjaman = KasabianPeminjaman::create([
            'userId' => $request->kasabianPeminjamId,
            'bukuId' => $request->kasabianBukuId,
            'tanggalPeminjaman' => $request->kasabianTanggalPeminjaman,
            'tanggalPengembalian' => $request->kasabianTanggalPengembalian,
            'statusPeminjaman' => 'Dipinjam',
        ]);

        return redirect()->route('peminjamHome');
    }

    public function kembalikanBuku($id)
    {
        $kasabianPeminjaman = KasabianPeminjaman::find($id);

        $kasabianPeminjaman->update([
            'statusPeminjaman' => 'Dikembalikan',
        ]);

        return redirect()->route('displayPinjam');
    }
}
