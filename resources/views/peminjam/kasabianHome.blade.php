@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow"></h1>
@endsection

@section('content')
    <div class="grid grid-cols-5 gap-x-5 gap-y-5">
        @foreach ($dataBuku as $item)
            <div class="col-span-1 h-80 w-42 p-5 bg-white rounded-md">
                <a href="{{route('bukuDetail', $item->bukuId)}}">
                    <section class="bg-gray-300 h-4/6">

                    </section>
                </a>
                <h1 class="mt-2 text-gray-500 text-xs">{{ $item->kasabianPenulis }}, {{ $item->kasabianPenerbit }}</h1>
                <h1 class="">{{ $item->kasabianJudul }}</h1>
                <h1 class="text-gray-500 text-xs">
                    {{ $item->relasi->pluck('kategori')->flatten()->pluck('kasabianNamaKategori')->join(' ') }}
                </h1>
                {{-- <button class="w-full bg-gray-200 rounded-sm">Detail</button> --}}
            </div>
        @endforeach
    </div>
@endsection
