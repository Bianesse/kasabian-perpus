<?php

namespace App\Http\Controllers;

use App\Models\KasabianUlasanBuku;
use App\Http\Requests\StoreKasabianUlasanBukuRequest;
use App\Http\Requests\UpdateKasabianUlasanBukuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KasabianUlasanBukuController extends Controller
{
    public function tambahUlasan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kasabianUlasan' => 'required',
            'kasabianRating' => 'required',
        ]);

        $kasabianUlasan = $request->kasabianUlasan;
        $kasabianRating = $request->kasabianRating;

        KasabianUlasanBuku::create([
            'bukuId' => $id,
            'userId' => Auth::user()->id,
            'ulasan' => $kasabianUlasan,
            'rating' => $kasabianRating,
        ]);

        return redirect()->back();
    }
}
