@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Data buku</h1>
@endsection

@section('content')
    <div class="flex flex-col">
        <a href="{{ route('tambahBukuPage') }}">
            @if ($userData->kasabianRoleId == 1)
                <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2">
                    Tambah
                </button>
            @endif
        </a>
        <table class="w-full text-sm text-left text-gray-500 border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr class="text-left">
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Penulis</th>
                    <th class="px-4 py-3">Penerbit</th>
                    <th class="px-4 py-3">Tahun Terbit</th>
                    @if ($userData->kasabianRoleId == 1)
                        <th class="px-4 py-3">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($dataBuku as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3"><img src="{{ asset('storage/' . $item->kasabianGambar) }}" class="w-10"
                                alt=""></td>
                        <td class="px-4 py-3">{{ $item->kasabianJudul }}</td>
                        <td class="px-4 py-3">
                            {{ $item->relasi->kategori->kasabianNamaKategori }}
                        </td>
                        <td class="px-4 py-3">{{ $item->kasabianPenulis }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianPenerbit }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianTahunTerbit }}</td>
                        @if ($userData->kasabianRoleId == 1)
                            <td class="flex flex-row space-x-2 px-4 py-3 text-white">
                                <a href="{{ route('editBukuPage', $item->bukuId) }}">
                                    <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2">
                                        Edit
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('hapusBuku', $item->bukuId) }}">
                                    @csrf
                                    <button onclick="return confirm('Apakah ingin menghapus data ini?')"
                                        class="bg-red-500 rounded-lg w-20 h-10 font-medium my-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
