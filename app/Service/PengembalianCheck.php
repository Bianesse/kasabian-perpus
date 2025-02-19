<?php

namespace App\Service;

use Carbon\Carbon;
use App\Models\KasabianPeminjaman;

class PengembalianCheck
{

    public function checkPengembalian()
    {
        $today = Carbon::now();

        KasabianPeminjaman::where('tanggalPengembalian', '<', $today)
            ->where('statusPeminjaman', '!=', 'Dikembalikan')
            ->update(['statusPeminjaman' => 'Terlambat']);
    }
}
