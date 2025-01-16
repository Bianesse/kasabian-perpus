@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Tambah buku</h1>
@endsection

@section('content')
    <div>
        <form action="" method="POST">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-4">
                <div class="col-span-2">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="kasabianJudul" id="judul"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        placeholder="Ketik Judul" required>
                </div>
                <div class="col-span-2">
                    <label for="penulis" class="block mb-2 text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" name="kasabianPenulis" id="penulis"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        placeholder="Ketik Penulis" required>
                </div>
                <div class="col-span-1">
                    <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                    <input type="text" name="kasabianPenerbit" id="penerbit"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        placeholder="Ketik Penerbit" required>
                </div>
                <div class="col-span-1">
                    <label for="tahunTerbit" class="block mb-2 text-sm font-medium text-gray-700">Tahun Terbit</label>
                    <input type="number" name="kasabianTahunTerbit" id="tahunTerbit"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        placeholder="Ketik Tahun Terbit" required>
                </div>
                <div class="col-span-2">
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kasabianKategori" id="kategori" class="bg-white border border-gray-300  rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5">
                        @foreach ($dataKategori as $item)
                            <option value="{{$item->kategoriId}}">{{$item->kasabianNamaKategori}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-4">
                    <button class="bg-green-500 rounded-lg w-full h-10 font-medium border-2 border-green-700">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
