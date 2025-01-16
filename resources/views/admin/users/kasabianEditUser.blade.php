@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Tambah buku</h1>
@endsection

@section('content')
    <div>
        <form action="{{route('editKategori', $dataKategori->kategoriId)}}" method="POST">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-4">

                <div class="col-span-2">
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input type="text" name="kasabianKategori" id="kategori"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        value="{{$dataKategori->kasabianNamaKategori}}" placeholder="Ketik Judul" required>
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
