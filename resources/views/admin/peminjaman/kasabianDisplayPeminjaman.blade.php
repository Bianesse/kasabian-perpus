@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow"></h1>
@endsection

@section('content')
    <table class="w-full text-sm text-left text-gray-500 border border-gray-300 rounded-lg shadow-lg">
        <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
            <tr>
                <th class="px-4 py-3">No.</th>
                <th class="px-4 py-3">Nama Peminjam</th>
                <th class="px-4 py-3">Judul Buku</th>
                <th class="px-4 py-3">Tanggal Peminjaman</th>
                <th class="px-4 py-3">Tanggal Pengembalian</th>
                <th class="px-4 py-3">Status Peminjaman</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($dataPeminjaman as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $item->users->kasabianNamaLengkap }}</td>
                    <td class="px-4 py-3">{{ $item->books->kasabianJudul }}</td>
                    <td class="px-4 py-3">{{ $item->tanggalPeminjaman }}</td>
                    <td class="px-4 py-3">{{ $item->tanggalPengembalian }}</td>
                    <td class="px-4 py-3">
                        @if ($item->statusPeminjaman === 'Dikembalikan')
                            <span class="px-2 py-1 text-white bg-green-500 rounded-lg">Dikembalikan</span>
                        @elseif ($item->statusPeminjaman === 'Dipinjam')
                            <span class="px-2 py-1 text-white bg-blue-500 rounded-lg">Dipinjam</span>
                        @elseif ($item->statusPeminjaman === 'Pending Dikembalikan')
                            <span class="px-2 py-1 text-black bg-yellow-300 rounded-lg">Pending Dikembalikan</span>
                        @elseif ($item->statusPeminjaman === 'Pending Dipinjam')
                            <span class="px-2 py-1 text-black bg-yellow-300 rounded-lg">Pending Dipinjam</span>
                        @else
                            <span class="px-2 py-1 text-white bg-red-500 rounded-lg">Overdue</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex flex-row space-x-2">
                        <form action="{{ route('adminKonfirmasiPeminjaman', $item->peminjamanId) }}" method="POST">
                            @csrf
                            <button onclick="return confirm('Apakah mau konfirmasi buku?')"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg px-4 py-2"
                                @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                @if ($item->statusPeminjaman === 'Pending Dikembalikan' || $item->statusPeminjaman === 'Pending Dipinjam')
                                    Konfirmasi
                                @elseif ($item->statusPeminjaman === 'Dipinjam')
                                    Kembalikan
                                @else
                                    Selesai
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
