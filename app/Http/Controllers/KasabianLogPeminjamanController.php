<?php

namespace App\Http\Controllers;

use App\Models\Kasabian_book;
use App\Models\KasabianKategoriBuku;
use App\Models\KasabianPeminjaman;
use Illuminate\Http\Request;

class KasabianLogPeminjamanController extends Controller
{
    public function showLog(Request $request)
    {
        $kasabianTotalBuku = Kasabian_book::count();

        $kasabianTotalKategori = KasabianKategoriBuku::count();

        $kasabianTotalTerpinjam = KasabianPeminjaman::where('statusPeminjaman', 'Dikembalikan')->count();

        $kasabianBukuPopuler = Kasabian_book::withCount('peminjaman')
            ->orderByDesc('peminjaman_count')
            ->first();

        $kasabianBukuTidakPopuler = Kasabian_book::withCount('peminjaman')
            ->orderBy('peminjaman_count')
            ->first();

        $kasabianLog = KasabianPeminjaman::with(['users', 'books']);

        if ($request->has('kasabianDari') && $request->has('kasabianHingga')) {
            $kasabianDari = $request->kasabianDari;
            $kasabianHingga = $request->kasabianHingga;

            $kasabianLog = $kasabianLog->whereBetween('tanggalPeminjaman',  [$kasabianDari, $kasabianHingga]);
        }

        $kasabianLog = $kasabianLog->get();

        return view('admin.logs.kasabianLogPeminjaman', compact(
            'kasabianTotalBuku',
            'kasabianTotalKategori',
            'kasabianTotalTerpinjam',
            'kasabianBukuPopuler',
            'kasabianBukuTidakPopuler',
            'kasabianLog'
        ));
    }
}
