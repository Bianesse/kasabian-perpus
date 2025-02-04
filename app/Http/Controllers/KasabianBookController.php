<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasabian_book;
use App\Models\KasabianKategoriBuku;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateKasabian_bookRequest;
use App\Models\KasabianKategoriBukuRelasi;

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

    public function detail($id)
    {
        $kasabianBuku = Kasabian_book::with(['relasi.kategori', 'ulasan.users'])->find($id);

        $kasabianCount = $kasabianBuku->ulasan->count('rating');
        $kasabianSum = $kasabianBuku->ulasan->sum('rating');

        $kasabianAverage = $kasabianCount > 0 ? round($kasabianSum / $kasabianCount, 1) : 0;

        return view('peminjam.kasabianBukuDetail', ['dataBuku' => $kasabianBuku, 'dataUlasan' => $kasabianAverage]);
    }

    public function tambahBukuPage()
    {
        $kasabianKategori = KasabianKategoriBuku::get();
        return view('admin.buku.kasabianTambahBuku', ['dataKategori' => $kasabianKategori]);
    }

    public function tambahBuku(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kasabianJudul' => 'required',
            'kasabianPenulis' => 'required',
            'kasabianPenerbit' => 'required',
            'kasabianDeskripsi' => 'required',
            'kasabianGambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'kasabianTahunTerbit' => 'required',
            'kasabianKategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $file = $request->file('kasabianGambar');
        $path = $file->store('photos', 'public');
        $url = asset('storage/' . $path);

        $kasabianBuku = Kasabian_book::create([
            'kasabianJudul' => $request->kasabianJudul,
            'kasabianPenulis' => $request->kasabianPenulis,
            'kasabianPenerbit' => $request->kasabianPenerbit,
            'kasabianTahunTerbit' => $request->kasabianTahunTerbit,
            'kasabianGambar' => $url,
            'kasabianDeskripsi' => $request->kasabianDeskripsi,
        ]);

        $bukuId = Kasabian_book::latest()->pluck('bukuId')->first();

        $kasabianKategori = KasabianKategoriBukuRelasi::create([
            'bukuId' => $bukuId,
            'kategoriId' => $request->kasabianKategori
        ]);

        return redirect()->route('book');
    }

    public function editBukuPage($id)
    {
        $kasabianBuku = Kasabian_book::find($id);
        $kasabianKategori = KasabianKategoriBuku::get();
        return view('admin.buku.kasabianEditBuku', ['dataBuku' => $kasabianBuku, 'dataKategori' => $kasabianKategori]);
    }

    public function editBuku(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kasabianJudul' => 'required',
            'kasabianPenulis' => 'required',
            'kasabianPenerbit' => 'required',
            'kasabianDeskripsi' => 'required',
            'kasabianGambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'kasabianTahunTerbit' => 'required',
            'kasabianKategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $kasabianBuku = Kasabian_book::with('relasi')->find($id);

        $kasabianBuku->update([
            'kasabianJudul' => $request->kasabianJudul,
            'kasabianPenulis' => $request->kasabianPenulis,
            'kasabianPenerbit' => $request->kasabianPenerbit,
            'kasabianTahunTerbit' => $request->kasabianTahunTerbit,
            'kasabianDeskripsi' => $request->kasabianDeskripsi,
        ]);

        if($request->file('kasabianGambar')){
            $file = $request->file('kasabianGambar');
            $path = $file->store('photos', 'public');
            $url = asset('storage/' . $path);

            $kasabianBuku->update([
                'kasabianGambar' => $url,
            ]);
        }

        $kasabianKategori = KasabianKategoriBukuRelasi::where('bukuId', $id)->first();
        $kasabianKategori->update([
            'kategoriId' => $request->kasabianKategori,
        ]);

        $kasabianKategori->save();

        return redirect()->route('book');
    }

    public function hapusBuku($id)
    {
        $kasabianBuku = Kasabian_book::destroy($id);
        return redirect()->route('book');
    }

    public function kategori()
    {
        $kasabianKategori = KasabianKategoriBuku::with('relasi.books')->get();

        return view('admin.kategori.kasabianKategori', ['dataKategori' => $kasabianKategori]);
    }

    public function tambahKategoriPage()
    {
        $kasabianKategori = KasabianKategoriBuku::get();
        return view('admin.kategori.kasabianTambahKategori');
    }

    public function tambahKategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kasabianKategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $kasabianKategori = KasabianKategoriBuku::create([
            'kasabianNamaKategori' => $request->kasabianKategori
        ]);

        return redirect()->route('kategori');
    }

    public function hapusKategori($id)
    {
        $kasabianKategori = KasabianKategoriBuku::destroy($id);
        return redirect()->route('kategori');
    }

    public function editKategoriPage($id)
    {
        $kasabianKategori = KasabianKategoriBuku::find($id);
        return view('admin.kategori.kasabianEditKategoriPage', ['dataKategori' => $kasabianKategori]);
    }

    public function editKategori(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kasabianKategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $kasabianKategori = KasabianKategoriBuku::find($id);

        $kasabianKategori->update([
            'kasabianNamaKategori' => $request->kasabianKategori,
        ]);

        return redirect()->route('kategori');
    }


}
