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

            <div class="grid grid-cols-5 gap-2">
                <!-- Button that spans 4 columns -->
                <a href="{{ route('pinjamPage', $dataBuku->bukuId) }}" class="col-span-4">
                    <button
                        class="bg-gray-300 font-medium text-black rounded-lg border-2 border-gray-700 w-full h-10 mt-3">
                        Pinjam
                    </button>
                </a>

                <!-- Button that spans 1 column with a star icon -->
                <form method="POST" action="{{route('tambahKoleksi', $dataBuku->bukuId)}}">
                    @csrf
                    <button
                        class="col-span-1 bg-yellow-400 flex items-center justify-center font-medium text-black rounded-lg border-2 border-yellow-500 w-full h-10 mt-3">
                        <!-- Star Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </button>
                </form>
            </div>


        </div>
    </div>
@endsection
