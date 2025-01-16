@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Kategori buku</h1>
@endsection

@section('content')
    <div class="flex flex-col">
        <a href="{{ route('tambahKategoriPage') }}">
            <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2">
                Tambah
            </button>
        </a>
        <table class="divide-y divide-gray-300 border">
            <thead class="bg-gray-50">
                <tr class="text-left">
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Buku</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($dataKategori as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kasabianNamaKategori }}</td>
                    <td>
                        @foreach ($item->relasi as $data)
                            @foreach ($data->books as $buku)
                                {{ $buku->kasabianJudul }},
                            @endforeach
                        @endforeach
                    </td>
                    <td>
                        <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2">
                            Edit
                        </button>
                        <button class="bg-red-500 rounded-lg w-20 h-10 font-medium my-2">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
