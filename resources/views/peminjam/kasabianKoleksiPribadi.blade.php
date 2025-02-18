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
                            class="w-full h-60 object-cover rounded-md" alt="">
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

                    <div class="flex justify-center mt-2 space-x-2">
                        <h1 class="text-gray-500 text-xs text-center">{{ $item->average_rating }}</h1>

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($item->average_rating >= $i)
                                <i class="fas fa-star text-yellow-400"></i>
                            @elseif ($item->average_rating >= $i - 0.5)
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            @else
                                <i class="far fa-star text-yellow-400"></i>
                            @endif
                        @endfor
                    </div>

                    @auth
                    <div class="grid grid-cols-1 w-full">
                        <a href="{{ route('pinjamPage', $item->bukuId) }}">
                            <button class="col-span-1 bg-gray-300 font-medium text-black rounded-lg border-2 border-gray-700 w-full h-11 mt-5">
                                Pinjam
                            </button>
                        </a>
                    </div>
        
                    
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
@endsection
