@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Koleksi Pribadi</h1>
@endsection

@section('content')
    <div class="grid grid-cols-5 gap-x-5 gap-y-5">
        @foreach ($dataKoleksi as $item)
            <div class="col-span-1 max-h-88 w-42 p-5 bg-white rounded-md">
                <div class="grid grid-rows">
                    <div class="max-w-60">
                        <a href="{{ route('bukuDetail', $item->bukuId) }}">
                            <img src="{{ $item->books->kasabianGambar }}" style="" alt="">
                        </a>
                    </div>
                    <div>
                        <h1 class="col-span-1 mt-2 text-gray-500 text-xs">{{ $item->books->kasabianPenulis }},
                            {{ $item->books->kasabianPenerbit }}</h1>
                        <a href="{{ route('bukuDetail', $item->bukuId) }}">
                            <h1 class="">{{ $item->books->kasabianJudul }}</h1>
                        </a>
                        <h1 class="col-span-1 text-gray-500 text-xs">
                            {{ $item->books->relasi->kategori->kasabianNamaKategori }}
                        </h1>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
