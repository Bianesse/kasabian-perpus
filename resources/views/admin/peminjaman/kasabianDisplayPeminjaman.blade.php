@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Peminjaman</h1>
@endsection

@section('content')
    @if ($userData->kasabianRoleId == 1 || $userData->kasabianRoleId == 2)
        <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2" data-modal-toggle="insert-modal"
            data-modal-target="insert-modal">
            Tambah
        </button>
    @endif
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
                            <span class="px-2 py-1 text-red-700 bg-red-100 rounded-lg">Terlambat</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 space-x-2">
                        @if ($item->statusPeminjaman === 'Pending Dikembalikan' || $item->statusPeminjaman === 'Pending Dipinjam')
                            <form class="flex space-x-1"
                                action="{{ route('adminKonfirmasiPeminjaman', $item->peminjamanId) }}" method="POST">
                                @csrf
                                <div class="flex space-x-2 w-full">
                                    <button onclick="return confirm('Apakah mau konfirmasi buku?')"
                                        name="kasabianKonfirmasi" value="1"
                                        class="w-10 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg py-2 px-4 flex items-center justify-center space-x-2"
                                        @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                        <i class="fas fa-check"></i>
                                    </button>

                                    <button onclick="return confirm('Apakah mau konfirmasi peminjaman?')"
                                        name="kasabianTolak" value="1"
                                        class="w-10 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg py-2 px-4 flex items-center justify-center space-x-2"
                                        @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </form>
                        @elseif ($item->statusPeminjaman === 'Dipinjam')
                            <form class="flex space-x-1"
                                action="{{ route('adminKonfirmasiPeminjaman', $item->peminjamanId) }}" method="POST">
                                @csrf
                                <button onclick="return confirm('Apakah mau tolak peminjaman?')"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg px-4 py-2 flex-1"
                                    @disabled($item->statusPeminjaman === 'Dikembalikan')>
                                    Kembalikan
                                </button>
                            </form>
                        @elseif ($item->statusPeminjaman === 'Terlambat')
                            @if ($item->denda == 0)
                                <span class="text-green-600 font-medium">Denda sudah dibayar</span>
                            @else
                                <div class="flex flex-col items-center w-full">
                                    <span class="text-red-600 font-semibold">Denda: Rp
                                        {{ number_format($item->denda, 0, ',', '.') }}</span>
                                    <form action="{{ route('bayarDenda', $item->peminjamanId) }}" method="POST"
                                        class="w-full">
                                        @csrf
                                        <button onclick="confirmBayar(event, this)"
                                            class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg px-3 py-1 mt-2">
                                            Bayar
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @else
                            <h1 class="text-gray-700 font-medium">Selesai</h1>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-crud-modal id="insert-modal">
        <x-slot name='header'>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                <h3 class="text-lg font-semibold text-primary-yellow">
                    Pinjamkan Buku
                </h3>
                <button type="button" id="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="insert-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name='body'>
            <form action="{{ route('adminPinjamkan') }}" class="p-4 md:p-5" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-4">

                    <div class="col-span-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama Peminjam</label>
                        <select name="kasabianUser" id="nama"
                            class="bg-white border border-gray-300 rounded-lg block w-full p-2">
                            @foreach ($dataUser as $item)
                                <option value="{{ $item->id }}">{{ $item->kasabianNamaLengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul Buku</label>
                        <select name="kasabianBuku" id="judul"
                            class="bg-white border border-gray-300 rounded-lg block w-full p-2">
                            @foreach ($dataBuku as $item)
                                @if ($item->stock > 0)
                                    <option value="{{ $item->bukuId }}">{{ $item->kasabianJudul }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                    <div class="col-span-4">
                        <label for="tangganPeminjaman" class="block mb-2 text-sm font-medium text-gray-700">Tanggal
                            Peminjaman</label>
                        <input type="date" name="kasabianTanggalPeminjaman" id="tangganPeminjaman"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Judul" required>
                    </div>

                </div>


                <button type="submit"
                    class="text-primary-yellow hover:text-white inline-flex items-center border border-primary-yellow bg-transparent hover:bg-primary-yellow focus:ring-4 focus:outline-none focus:ring-primary-yellow font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-blue-700">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Pinjamkan
                </button>
            </form>
        </x-slot>
    </x-crud-modal>
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
