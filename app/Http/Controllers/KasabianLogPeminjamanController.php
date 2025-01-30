<?php

namespace App\Http\Controllers;

use App\Models\KasabianPeminjaman;
use Illuminate\Http\Request;

class KasabianLogPeminjamanController extends Controller
{
    public function showLog(Request $request)
    {
        $kasabianLog = KasabianPeminjaman::with(['users', 'books']);

        if ($request->has('kasabianDari') && $request->has('kasabianHingga')) {
            $kasabianDari = $request->kasabianDari;
            $kasabianHingga = $request->kasabianHingga;

            $kasabianLog = $kasabianLog->whereBetween('tanggalPeminjaman',  [$kasabianDari, $kasabianHingga]);
        }

        $kasabianLog = $kasabianLog->get();

        return view('admin.logs.kasabianLogPeminjaman', ['dataLog' => $kasabianLog]);
    }
}
