<div class="grid grid-cols-3 gap-6 print:hidden">
    <!-- Total Books -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Total Buku</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianTotalBuku }}</p>
    </div>

    <!-- Total Categories -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Total Kategori</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianTotalKategori }}</p>
    </div>

    <!-- Total Borrowed Books -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Buku Terpinjam</h2>
        <p class="text-3xl font-bold text-gray-900">{{ $kasabianTotalTerpinjam }}</p>
    </div>
</div>

<!-- Popular & Least Popular Books -->
<div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 print:hidden">
    <!-- Most Popular Books -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Buku Paling Populer</h2>
        <p class="text-2xl font-bold text-gray-900">{{ $kasabianBukuPopuler->kasabianJudul }}</p>
    </div>

    <!-- Least Popular Books -->
    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-lg font-semibold text-gray-700">Buku Tidak Populer</h2>
        <p class="text-2xl font-bold text-gray-900">{{ $kasabianBukuTidakPopuler->kasabianJudul }}</p>
    </div>
</div>
