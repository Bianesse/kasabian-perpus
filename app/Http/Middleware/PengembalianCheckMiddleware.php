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
        return $next($request);
    }

    public function checkPengembalian()
    {
        $today = Carbon::now();

        KasabianPeminjaman::where('tanggalPengembalian', '<', $today)
            ->where('statusPeminjaman', '!=', 'Dikembalikan')
            ->update(['statusPeminjaman' => 'Terlambat']);
    }
}
