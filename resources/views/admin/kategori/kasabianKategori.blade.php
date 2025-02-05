@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Kategori buku</h1>
@endsection

@section('content')
    <div class="flex flex-col">
        <a href="{{ route('tambahKategoriPage') }}">
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
                    <th class="px-4 py-3">Nama Kategori</th>
                    <th class="px-4 py-3">Buku</th>
                    @if ($userData->kasabianRoleId == 1)
                        <th class="px-4 py-3">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($dataKategori as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianNamaKategori }}</td>
                        <td class="px-4 py-3">
                            @if (!empty($item->relasi->books->kasabianJudul))
                                {{ $item->relasi->books->kasabianJudul }}
                            @endif

                        </td>
                        @if ($userData->kasabianRoleId == 1)
                            <td class="px-4 py-3 flex flex-row space-x-2 text-white">
                                <a href="{{ route('editKategoriPage', $item->kategoriId) }}">
                                    <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2">
                                        Edit
                                    </button>
                                </a>
                                <form method="POST" action="{{ route('hapusKategori', $item->kategoriId) }}">
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
