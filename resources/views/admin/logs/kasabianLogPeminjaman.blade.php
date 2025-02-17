@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Report Peminjaman</h1>
@endsection

@section('content')
    <x-dashboard-data :kasabianTotalTerpinjam="$kasabianTotalTerpinjam" :kasabianTotalBuku="$kasabianTotalBuku" :kasabianTotalKategori="$kasabianTotalKategori" :kasabianBukuPopuler="$kasabianBukuPopuler" :kasabianBukuTidakPopuler="$kasabianBukuTidakPopuler" />

    <form action="{{ route('showLogFilter') }}" method="POST" class="flex items-center gap-4 bg-gray-100 p-4 rounded-lg">
        @csrf
        <label for="kasabianTanggalAwal" class="text-gray-700 font-medium">Dari:</label>
        <input type="date" name="kasabianDari" id="kasabianTanggalAwal" 
            class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <label for="kasabianTanggalAkhir" class="text-gray-700 font-medium">Hingga:</label>
        <input type="date" name="kasabianHingga" id="kasabianTanggalAkhir"
            class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg px-4 py-2">
            Filter
        </button>

        <button type="button" onclick="window.print()"
            class="bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg px-4 py-2">
            Print
        </button>
    </form>


    <table class="w-full text-sm text-left text-gray-500 border border-gray-300 rounded-lg shadow-lg print-table">
        <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
            <tr>
                <th class="px-4 py-3">No.</th>
                <th class="px-4 py-3">Nama Peminjam</th>
                <th class="px-4 py-3">Judul Buku</th>
                <th class="px-4 py-3">Tanggal Peminjaman</th>
                <th class="px-4 py-3">Tanggal Pengembalian</th>
                <th class="px-4 py-3">Status Peminjaman</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($kasabianLog as $item)
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('extra')
    <div class="w-5/6 mx-auto mt-5 bg-gray-100">

        <section class="hidden print:block text-end mt-5">
            <h1 class="text-lg font-semibold">{{ $userData->kasabianNamaLengkap }}</h1>
            <div class="mt-10 border-t border-black w-1/5 ml-auto">

            </div>
        </section>
    </div>
@endsection
