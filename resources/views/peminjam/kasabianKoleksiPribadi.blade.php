@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Koleksi Pribadi</h1>
@endsection

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @foreach ($dataKoleksi as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                <div class="flex flex-col items-center">
                    <a href="{{ route('bukuDetail', $item->bukuId) }}">
                        <img src="{{ asset('storage/' . $item->books->kasabianGambar) }}"
                            class="w-full h-80 object-cover rounded-md" alt="">
                    </a>
                    <h1 class="mt-2 text-gray-500 text-xs text-center">
                        {{ $item->books->kasabianPenulis }}, {{ $item->books->kasabianPenerbit }}
                    </h1>
                    <a href="{{ route('bukuDetail', $item->bukuId) }}" class="text-center">
                        <h1 class="text-sm font-medium text-gray-800">{{ $item->books->kasabianJudul }}</h1>
                    </a>
                    <h1 class="text-gray-500 text-xs text-center">
                        {{ $item->books->relasi->kategori->kasabianNamaKategori }}
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection
