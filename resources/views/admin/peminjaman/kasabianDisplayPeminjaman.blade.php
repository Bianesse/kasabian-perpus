@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Peminjaman</h1>
@endsection

@section('content')
    <table id="peminjamanTable" class="w-full text-sm text-left text-gray-500 border border-gray-300 rounded-lg shadow-lg">
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
                            <span class="px-2 py-1 text-green-700 bg-green-100 rounded-lg">Dikembalikan</span>
                        @elseif ($item->statusPeminjaman === 'Dipinjam')
                            <span class="px-2 py-1 text-blue-700 bg-blue-100 rounded-lg">Dipinjam</span>
                        @elseif ($item->statusPeminjaman === 'Pending Dikembalikan')
                            <span class="px-2 py-1 text-yellow-700 bg-yellow-100 rounded-lg">Pending Dikembalikan</span>
                        @elseif ($item->statusPeminjaman === 'Pending Dipinjam')
                            <span class="px-2 py-1 text-yellow-700 bg-yellow-100 rounded-lg">Pending Dipinjam</span>
                        @else
                            <span class="px-2 py-1 text-red-700 bg-red-100 rounded-lg">Overdue</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 space-x-2">
                        <form class="grid grid-cols-2 space-x-1"
                            action="{{ route('adminKonfirmasiPeminjaman', $item->peminjamanId) }}" method="POST">
                            @csrf
                            @if ($item->statusPeminjaman === 'Pending Dikembalikan' || $item->statusPeminjaman === 'Pending Dipinjam')
                                <button onclick="return confirm('Apakah mau konfirmasi buku?')" name="kasabianKonfirmasi"
                                    value="1"
                                    class="col-span-1 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg py-2 flex items-center justify-center space-x-2"
                                    @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                    <i class="fas fa-check"></i>
                                </button>

                                <button onclick="return confirm('Apakah mau konfirmasi peminjaman?')" name="kasabianTolak"
                                    value="1"
                                    class="col-span-1 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg py-2 flex items-center justify-center space-x-2"
                                    @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                    <i class="fas fa-times"></i>
                                </button>
                            @elseif ($item->statusPeminjaman === 'Dipinjam')
                                <button onclick="return confirm('Apakah mau tolak peminjaman?')"
                                    class="col-span-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg px-3 py-2"
                                    @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                    Kembalikan
                                </button>
                            @else
                                Selesai
                            @endif

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#peminjamanTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true,
            });
        });
    </script>
@endpush
