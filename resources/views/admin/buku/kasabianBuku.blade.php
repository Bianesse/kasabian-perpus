@extends('layout.main')

@section('head')
            <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Data buku</h1>
@endsection

@section('content')
    <div class="flex flex-col">
        <a href="{{route('tambahBukuPage')}}">
        <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2">
            Tambah
        </button>
        </a>
        <table class="divide-y divide-gray-300 border">
            <thead class="bg-gray-50">
                <tr class="text-left">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($dataBuku as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kasabianJudul }}</td>
                    <td>
                        @foreach ($item->relasi as $data)
                            @foreach ($data->kategori as $kategori)
                                {{ $kategori->kasabianNamaKategori }},
                            @endforeach
                        @endforeach
                    </td>
                    <td>{{ $item->kasabianPenulis }}</td>
                    <td>{{ $item->kasabianPenerbit }}</td>
                    <td>{{ $item->kasabianTahunTerbit }}</td>
                    <td class="flex flex-row space-x-2">
                        <a href="{{route('editBukuPage', $item->bukuId)}}">
                            <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2">
                                Edit
                            </button>
                        </a>
                        <form method="POST" action="{{route('hapusBuku', $item->bukuId)}}">
                            @csrf
                            <button onclick="return confirm('Apakah ingin menghapus data ini?')" class="bg-red-500 rounded-lg w-20 h-10 font-medium my-2">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
