@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Dashboard</h1>
@endsection

@section('content')
<div class="grid grid-cols-3 gap-5">
    <!-- Total Books -->
    <div class="bg-white p-5 rounded-lg shadow border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Total Buku</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianTotalBuku }}</p>
    </div>

    <!-- Total Categories -->
    <div class="bg-white p-5 rounded-lg shadow border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Total Kategori</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianTotalKategori }}</p>
    </div>

    <!-- Total Borrowed Books -->
    <div class="bg-white p-5 rounded-lg shadow border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Buku Terpinjam</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianTotalTerpinjam }}</p>
    </div>
</div>

<!-- Popular & Least Popular Books -->
<div class="mt-5 grid grid-cols-2 gap-5">
    <!-- Most Popular Books -->
    <div class="bg-white p-5 rounded-lg shadow border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Buku Paling Populer</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianBukuPopuler->kasabianJudul }}</p>

    </div>

    <!-- Least Popular Books -->
    <div class="bg-white p-5 rounded-lg shadow border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Buku Tidak Populer</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianBukuTidakPopuler->kasabianJudul }}</p>
    </div>
</div>
@endsection
