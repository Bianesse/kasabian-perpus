<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Kasabian_book;
use App\Models\KasabianPeminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreKasabianPeminjamanRequest;
use App\Http\Requests\UpdateKasabianPeminjamanRequest;
use App\Models\User;

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
        ]);

        $kasabianPeminjaman = KasabianPeminjaman::create([
            'userId' => $request->kasabianPeminjamId,
            'bukuId' => $request->kasabianBukuId,
            'tanggalPeminjaman' => $request->kasabianTanggalPeminjaman,
            'tanggalPengembalian' => null,
            'statusPeminjaman' => 'Pending Dipinjam',
        ]);

        return redirect()->route('peminjamHome');
    }

    public function kembalikanBuku($id)
    {
        $kasabianPeminjaman = KasabianPeminjaman::find($id);

        $kasabianPeminjaman->update([
            'statusPeminjaman' => 'Pending Dikembalikan',
        ]);

        return redirect()->route('displayPinjam');
    }

    public function adminDisplayPinjam()
    {
        $kasabianPeminjaman = KasabianPeminjaman::with(['users', 'books'])->get();
        $kasabianBuku = Kasabian_book::select('bukuId', 'kasabianJudul', 'stock')->get();
        $kasabianUser = User::select('id', 'kasabianNamaLengkap')->where('kasabianRoleId', 3)->get();

        return view('admin.peminjaman.kasabianDisplayPeminjaman', ['dataPeminjaman' => $kasabianPeminjaman, 'dataBuku' => $kasabianBuku, 'dataUser' => $kasabianUser]);
    }

    public function adminPinjamkan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kasabianUser' => 'required',
            'kasabianBuku' => 'required',
            'kasabianTanggalPeminjaman' => 'required',
        ]);

        $kasabianPeminjaman = KasabianPeminjaman::create([
            'userId' => $request->kasabianUser,
            'bukuId' => $request->kasabianBuku,
            'tanggalPeminjaman' => $request->kasabianTanggalPeminjaman,
            'tanggalPengembalian' => null,
            'statusPeminjaman' => 'Dipinjam',
        ]);

        Kasabian_book::where('bukuId', $request->kasabianBuku)->decrement('stock');

        return redirect()->route('adminPeminjaman');
    }

    public function adminKonfirmasiPinjam(Request $request, $id)
    {
        $kasabianPeminjaman = KasabianPeminjaman::with('books')->find($id);
        $kasabianBookId = $kasabianPeminjaman->books->bukuId;

        switch ($kasabianPeminjaman->statusPeminjaman) {
            case 'Pending Dipinjam':
                if ($request->kasabianTolak) {
                    $kasabianPeminjaman->update([
                        'statusPeminjaman' => 'Dikembalikan',
                        'tanggalPengembalian' => Carbon::now()->format('Y-m-d'),
                    ]);
                } elseif ($request->kasabianKonfirmasi) {
                    $kasabianPeminjaman->update([
                        'statusPeminjaman' => 'Dipinjam',
                    ]);
                    Kasabian_book::where('bukuId', $kasabianBookId)->decrement('stock');
                }
                break;
            case 'Pending Dikembalikan':
                if ($request->kasabianTolak) {
                    $kasabianPeminjaman->update([
                        'statusPeminjaman' => 'Dipinjam',
                    ]);
                } elseif ($request->kasabianKonfirmasi) {
                    $kasabianPeminjaman->update([
                        'statusPeminjaman' => 'Dikembalikan',
                        'tanggalPengembalian' => Carbon::now()->format('Y-m-d'),
                    ]);
                    Kasabian_book::where('bukuId', $kasabianBookId)->increment('stock');
                }
                break;
            case 'Dipinjam':
                $kasabianPeminjaman->update([
                    'statusPeminjaman' => 'Dikembalikan',
                    'tanggalPengembalian' => Carbon::now()->format('Y-m-d'),
                ]);
                Kasabian_book::where('bukuId', $kasabianBookId)->increment('stock');
                break;
        }

        return redirect()->route('adminPeminjaman');
    }
}
