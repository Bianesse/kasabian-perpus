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
                    <button class="bg-gray-300 font-medium text-black rounded-lg border-2 border-gray-700 w-full h-10 mt-3">
                        Pinjam
                    </button>
                </a>

                <!-- Button that spans 1 column with a star icon -->
                <form method="POST" action="{{ route('tambahKoleksi', $dataBuku->bukuId) }}">
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

@section('extra')
<h2 class="text-2xl font-semibold text-gray-800 mb-4">Ulasan</h2>

<!-- Review Form -->
<form action="" method="POST" class="mb-6">
    @csrf
    <textarea name="kasabianUlasan" id="ulasan"
        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-3 resize-none"
        placeholder="Masukkan ulasan Anda untuk buku ini..." required></textarea>

    <!-- Rating Input -->
    <div class="mt-3">
        <label for="rating" class="text-gray-700 font-medium">Beri Rating:</label>
        <select name="rating" id="rating" required
            class="ml-2 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow p-2">
            <option value="1">1 ★</option>
            <option value="2">2 ★</option>
            <option value="3">3 ★</option>
            <option value="4">4 ★</option>
            <option value="5">5 ★</option>
        </select>
    </div>

    <button type="submit"
        class="mt-3 bg-yellow-400 text-black font-medium px-5 py-2 rounded-lg hover:bg-yellow-500 transition-all">
        Kirim Ulasan
    </button>
</form>

<!-- Reviews List -->
<div class="space-y-4">
    @forelse ($dataBuku->ulasan as $ulasan)
        <div class="bg-white p-4 rounded-lg shadow border border-gray-200">
            <div class="flex items-center space-x-3">
                <!-- User Avatar -->
                <div class="bg-gray-300 h-10 w-10 flex items-center justify-center rounded-full text-gray-700 font-bold">
                    {{ strtoupper(substr($ulasan->users->kasabianNamaLengkap, 0, 1)) }}
                </div>
                <div>
                    <!-- User Name and Rating -->
                    <h3 class="text-gray-800 font-medium flex items-center">
                        {{ $ulasan->users->kasabianNamaLengkap }}
                        <span class="ml-2 text-yellow-500 flex items-center">
                            {{ $ulasan->rating }} ★
                        </span>
                    </h3>
                    <p class="text-gray-500 text-sm"></p>
                </div>
            </div>
            <!-- Review Content -->
            <p class="text-gray-700 mt-3">{{ $ulasan->ulasan }}</p>
        </div>
    @empty
        <p class="text-gray-500">Belum ada ulasan untuk buku ini.</p>
    @endforelse
</div>

@endsection

