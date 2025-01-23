@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow"></h1>
@endsection

@section('content')
    <div class="grid grid-cols-3 gap-x-5">
        <div class="col-span-1">
            <img src="{{ $dataBuku->kasabianGambar }}" alt="">
        </div>
        <div class="col-span-2 ml-5">
            <h1 class="text-gray-500 text-lg">{{ $dataBuku->kasabianPenulis }}, {{ $dataBuku->kasabianPenerbit }}</h1>
            <h1 class="text-3xl">{{ $dataBuku->kasabianJudul }}{{--  {{$dataUlasan}} --}}</h1>
            <h1 class="text-gray-500 text-md">
                {{ $dataBuku->relasi->pluck('kategori')->flatten()->pluck('kasabianNamaKategori')->join('') }}
            </h1>

            <h1 class="text-gray-500 text-md mt-8">
                {{ $dataBuku->kasabianDeskripsi }}
            </h1>

            <h1 class="text-gray-500 text-md mt-8">
                Stok: 20
            </h1>

            <a href="{{route('pinjamPage', $dataBuku->bukuId)}}">
                <button
                    class="bg-gray-300 font-medium text-black rounded-lg border-2 border-gray-700 w-full h-10 mt-3">Pinjam</button>
            </a>
        </div>
    </div>
@endsection
