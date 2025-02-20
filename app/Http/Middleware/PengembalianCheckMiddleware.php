<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\KasabianPeminjaman;
use Symfony\Component\HttpFoundation\Response;

class PengembalianCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->checkPengembalian();
        $this->checkDenda();
        return $next($request);
    }

    public function checkPengembalian()
    {
        $today = Carbon::now();

        KasabianPeminjaman::where('tanggalPengembalian', '<', $today)
            ->where('statusPeminjaman', '!=', 'Dikembalikan')
            ->update(['statusPeminjaman' => 'Terlambat']);
    }

    public function checkDenda()
    {
        $today = Carbon::now();

        $kasabianTerlambat = KasabianPeminjaman::where('statusPeminjaman', 'Terlambat')
            ->where(function ($query) {
                $query->whereNull('denda')
                    ->orWhere('denda', '!=', 0);
            })
            ->get();

        foreach ($kasabianTerlambat as $record) {
            $newDenda = round(Carbon::parse($record->tanggalPengembalian)->diffInDays($today)) * 1000;

            if ($record->denda != $newDenda) {
                $record->denda = $newDenda;
                $record->save();
            }
        }
    }
}
