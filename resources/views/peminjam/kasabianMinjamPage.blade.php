@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Pinjam Buku</h1>
@endsection

@section('content')
@if ($dataBuku->stock > 0)
<form action="{{route('pinjamBuku', $dataBuku->bukuId)}}" method="POST">
    @csrf
    <div class="grid gap-4 mb-4 grid-cols-4">
        <div class="col-span-2">
            <label for="peminjam" class="block mb-2 text-sm font-medium text-gray-700">Peminjam</label>
            <input type="text" name="" id="peminjam"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                value="{{ $userData->kasabianNamaLengkap }}" required disabled>
            <input type="hidden" name="kasabianPeminjamId" value="{{ $userData->id }}">
        </div>

        <div class="col-span-2">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="" id="judul"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                value="{{ $dataBuku->kasabianJudul }}" required disabled>
            <input type="hidden" name="kasabianBukuId" value="{{ $dataBuku->bukuId }}">
        </div>

        <div class="col-span-4">
            <label for="tanggalPeminjaman" class="block mb-2 text-sm font-medium text-gray-700">Tanggal
                Peminjaman</label>
            <input type="date" name="kasabianTanggalPeminjaman" id="tanggalPeminjaman" min={{ date('Y-m-d') }}
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" required>
        </div>
        <div class="col-span-4">
            <button class="bg-green-500 rounded-lg w-full h-10 font-medium border-2 border-green-700">
                Submit
            </button>
        </div>
    </div>
</form>
@else
    <h1 class="text-xl md:text-2xl font-bold text-red-600 text-center">Stock buku ini kosong!</h1>
@endif

@endsection
