@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow"></h1>
@endsection

@section('content')
    <form action="{{route('peminjamHome')}}" method="POST" class="mb-5 flex space-x-4">
        @csrf
        <select class="bg-white border border-gray-300 rounded-lg block w-48 p-2.5" name="kategoriId" id="">
            <option value="all" selected hidden>Pilih Kategori</option>
            @foreach ($dataKategori as $item)
                <option value="{{ $item->kategoriId }}">{{ $item->kasabianNamaKategori }}</option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg px-4 py-2">
            Filter
        </button>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @foreach ($dataBuku as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                <div class="flex flex-col items-center">
                    <a href="{{ route('bukuDetail', $item->bukuId) }}">
                        <img src="{{ asset('storage/'.$item->kasabianGambar ) }}" class="w-full h-80 object-cover rounded-md" alt="">
                    </a>
                    <h1 class="mt-2 text-gray-500 text-xs text-center">
                        {{ $item->kasabianPenulis }}, {{ $item->kasabianPenerbit }}
                    </h1>
                    <a href="{{ route('bukuDetail', $item->bukuId) }}" class="text-center">
                        <h1 class="text-sm font-medium text-gray-800">{{ $item->kasabianJudul }}</h1>
                    </a>
                    <h1 class="text-gray-500 text-xs text-center">
                        {{ $item->relasi->kategori->kasabianNamaKategori }}
                    </h1>
                </div>
            </div>
        @endforeach

    </div>
@endsection
