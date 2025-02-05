@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Edit</h1>
@endsection

@section('content')
    <div>
        <form action="{{ route('editBuku', $dataBuku->bukuId) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-4">
                <div class="col-span-2">
                    <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="kasabianJudul" id="judul"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        value="{{ $dataBuku->kasabianJudul }}" placeholder="Ketik Judul" required>
                </div>
                <div class="col-span-1">
                    <label for="penulis" class="block mb-2 text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" name="kasabianPenulis" id="penulis"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        value="{{ $dataBuku->kasabianPenulis }}" placeholder="Ketik Penulis" required>
                </div>
                <div class="col-span-1">
                    <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                    <input type="text" name="kasabianPenerbit" id="penerbit"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        value="{{ $dataBuku->kasabianPenerbit }}" placeholder="Ketik Penerbit" required>
                </div>
                <div class="col-span-1">
                    <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                    <input type="file" name="kasabianGambar" id="gambar"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Masukkan Gambar">
                </div>
                <div class="col-span-1">
                    <label for="tahunTerbit" class="block mb-2 text-sm font-medium text-gray-700">Tahun Terbit</label>
                    <input type="number" name="kasabianTahunTerbit" id="tahunTerbit"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        value="{{ $dataBuku->kasabianTahunTerbit }}" placeholder="Ketik Tahun Terbit" required>
                </div>
                <div class="col-span-2">
                    <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kasabianKategori" id="kategori"
                        class="bg-white border border-gray-300  rounded-lg block w-full p-2.5">
                        @foreach ($dataKategori as $item)
                            @if ($dataBuku->relasi->kategoriId == $item->kategoriId)
                                <option value="{{$item->kategoriId}}" selected hidden>{{$item->kasabianNamaKategori}}</option>
                            @endif
                            <option value="{{ $item->kategoriId }}">{{ $item->kasabianNamaKategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-4">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="kasabianDeskripsi" id="deskripsi"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Ketik Deskripsi" required>{{ $dataBuku->kasabianDeskripsi }}</textarea>
                </div>
                <div class="col-span-4">
                    <button type="submit"
                        class="bg-green-500 rounded-lg w-full h-10 font-medium border-2 border-green-700">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
