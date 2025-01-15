<?php

namespace App\Http\Controllers;

use App\Models\Kasabian_book;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKasabian_bookRequest;
use App\Http\Requests\UpdateKasabian_bookRequest;
use App\Models\KasabianKategoriBuku;

class KasabianBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasabianBuku = Kasabian_book::with('relasi.kategori')->get();

        
        return view('admin.buku.kasabianBuku', ['dataBuku' => $kasabianBuku]);
    }

    public function kategori()
    {
        $kasabianKategori = KasabianKategoriBuku::with('relasi.books')->get();

        return view('admin.kategori.kasabianKategori', ['dataKategori' => $kasabianKategori]);
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKasabian_bookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kasabian_book $kasabian_book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kasabian_book $kasabian_book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKasabian_bookRequest $request, Kasabian_book $kasabian_book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kasabian_book $kasabian_book)
    {
        //
    }
}
