<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasabian_book;
use App\Models\KasabianPeminjaman;
use App\Models\KasabianKategoriBuku;
use Illuminate\Support\Facades\Auth;

class KasabianHomeController extends Controller
{
    public function index()
    {
        $kasabianUser = Auth::user();

        if ($kasabianUser->kasabianRoleId == 1) {
            return redirect()->route('dashboard');
        } elseif ($kasabianUser->kasabianRoleId == 2) {
            return redirect()->route('dashboard');
        } elseif ($kasabianUser->kasabianRoleId == 3) {
            return redirect()->route('peminjamHome');
        } else {
            return redirect()->back();
        }
    }

    public function dashboard(Request $request)
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

        if ($request->filled('kasabianDari') && $request->filled('kasabianHingga')) {
            $kasabianDari = $request->kasabianDari;
            $kasabianHingga = $request->kasabianHingga;
        
            $kasabianLog = $kasabianLog->whereBetween('tanggalPeminjaman',  [$kasabianDari, $kasabianHingga]);
        }

        $kasabianLog = $kasabianLog->get();

        return view('admin.kasabianDashboard', compact(
            'kasabianTotalBuku',
            'kasabianTotalKategori',
            'kasabianTotalTerpinjam',
            'kasabianBukuPopuler',
            'kasabianBukuTidakPopuler',
            'kasabianLog'
        ));
    }
}
