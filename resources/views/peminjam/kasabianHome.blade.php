@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow"></h1>
@endsection

@section('content')
    @if ($errors->has('message'))
        <div class="mt-4 mb-4 text-red-600 bg-red-100 p-3 rounded border border-red-300">
            {{ $errors->first('message') }}
        </div>
    @endif
    <form action="{{ route('peminjamHome') }}" method="POST" class="mb-5 flex space-x-4">
        @csrf
        <input type="text" name="kasabianSearch" placeholder="Search..."
            class="bg-white border border-gray-300 rounded-lg block w-64 p-2.5">

        <select class="bg-white border border-gray-300 rounded-lg block w-40 p-2.5" name="kategoriId">
            <option value="all" selected hidden>Pilih Kategori</option>
            @foreach ($dataKategori as $item)
                <option value="{{ $item->kategoriId }}">{{ $item->kasabianNamaKategori }}</option>
            @endforeach
        </select>

        <button type="submit"
            class="border-2 border-blue-500 text-blue-500 bg-transparent font-medium rounded-lg px-4 py-2 transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white">
            Filter
        </button>

    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @foreach ($dataBuku as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden p-4 flex flex-col h-full">
                <!-- Content Section -->
                <div class="flex flex-col items-center flex-grow">
                    <a href="{{ route('bukuDetail', $item->bukuId) }}">
                        <img src="{{ asset('storage/' . $item->kasabianGambar) }}" class="w-full h-60 object-cover rounded-md" alt="">
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

                <!-- Bottom Section (Pinned Rating & Button) -->
                <div class="mt-auto">
                    <!-- Rating Section -->
                    <div class="flex justify-center items-center mt-2 space-x-2">
                        <h1 class="text-gray-500 text-xs">{{ $item->average_rating }}</h1>
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
                    <!-- Pinjam Button -->
                    <div class="w-full mt-3">
                        <a href="{{ $item->stock > 0 ? route('pinjamPage', $item->bukuId) : '#' }}" class="col-span-4">
                            <button
                                class="bg-gray-300 font-medium text-black rounded-lg border-2 border-gray-700 w-full h-10 mt-3
                                @if ($item->stock < 1) opacity-50 cursor-not-allowed @endif"
                                @if ($item->stock < 1) disabled @endif>
                                @if ($item->stock > 0)
                                    Pinjam
                                @else
                                    Stock Habis
                                @endif
                            </button>
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>



@endsection
