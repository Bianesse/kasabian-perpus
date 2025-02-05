@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow"></h1>
@endsection

@section('content')
<form action="">
    <select class="bg-white border border-gray-300 rounded-lg block w-48 p-2.5" name="" id="">
        @foreach ($dataKategori as $item)
        <option value="{{$item->kategoriId}}">{{$item->kasabianNamaKategori}}</option>
        @endforeach
    </select>
</form>
    <div class="grid grid-cols-5 gap-x-5 gap-y-5">
        @foreach ($dataBuku as $item)
            <div class="col-span-1 max-h-88 w-42 p-5 bg-white rounded-md">
                <div class="grid grid-rows">
                    <a href="{{ route('bukuDetail', $item->bukuId) }}">
                        <img src="{{ $item->kasabianGambar }}" class="w-40 h-60 object-cover" alt="">
                    </a>
                    <h1 class="mt-2 text-gray-500 text-xs">{{ $item->kasabianPenulis }}, {{ $item->kasabianPenerbit }}</h1>
                    <a href="{{ route('bukuDetail', $item->bukuId) }}">
                        <h1 class="">{{ $item->kasabianJudul }}</h1>
                    </a>
                    <h1 class="text-gray-500 text-xs">
                        {{ $item->relasi->kategori->kasabianNamaKategori }}
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection
