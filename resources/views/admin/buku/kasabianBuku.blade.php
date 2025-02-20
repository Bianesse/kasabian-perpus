@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Data buku</h1>
@endsection

@section('content')
    <div class="flex flex-col">
        @if ($userData->kasabianRoleId == 1)
            <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2" data-modal-toggle="insert-modal"
                data-modal-target="insert-modal">
                Tambah
            </button>
        @endif
        <table id="bukuTable" class="w-full text-sm text-left text-gray-500 border border-gray-300 rounded-lg shadow-lg">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr class="text-left">
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Penulis</th>
                    <th class="px-4 py-3">Penerbit</th>
                    <th class="px-4 py-3">Tahun Terbit</th>
                    <th class="px-4 py-3">Stok</th>
                    @if ($userData->kasabianRoleId == 1)
                        <th class="px-4 py-3">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($dataBuku as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            <img src="{{ asset('storage/' . $item->kasabianGambar) }}" class="w-10" alt="">
                        </td>
                        <td class="px-4 py-3">{{ $item->kasabianJudul }}</td>
                        <td class="px-4 py-3">{{ $item->relasi->kategori->kasabianNamaKategori }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianPenulis }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianPenerbit }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianTahunTerbit }}</td>
                        <td class="px-4 py-3">{{ $item->stock }}</td>
                        @if ($userData->kasabianRoleId == 1)
                            <td class="flex flex-row space-x-2 px-4 py-3 text-white">
                                <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2"
                                    data-modal-target="edit-modal{{ $item->bukuId }}"
                                    data-modal-toggle="edit-modal{{ $item->bukuId }}">
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('hapusBuku', $item->bukuId) }}">
                                    @csrf
                                    <button onclick="confirmDelete(event, this)" class="bg-red-500 rounded-lg w-20 h-10 font-medium my-2">
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

    <x-crud-modal id="insert-modal">
        <x-slot name='header'>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                <h3 class="text-lg font-semibold text-primary-yellow">
                    Tambah Buku
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
            <form action="{{ route('tambahBuku') }}" class="p-4 md:p-5" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-4">
                    <div class="col-span-4">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="kasabianJudul" id="judul"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Judul" required>
                    </div>

                    <div class="col-span-2">
                        <label for="penulis" class="block mb-2 text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" name="kasabianPenulis" id="penulis"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Penulis" required>
                    </div>

                    <div class="col-span-2">
                        <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                        <input type="text" name="kasabianPenerbit" id="penerbit"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Penerbit" required>
                    </div>

                    <div class="col-span-2">
                        <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="kasabianGambar" id="gambar"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5">
                    </div>

                    <div class="col-span-2">
                        <label for="tahunTerbit" class="block mb-2 text-sm font-medium text-gray-700">Tahun Terbit</label>
                        <input type="number" name="kasabianTahunTerbit" id="tahunTerbit"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Tahun Terbit" required>
                    </div>

                    <div class="col-span-2">
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
                        <select name="kasabianKategori" id="kategori"
                            class="bg-white border border-gray-300 rounded-lg block w-full p-2.5">
                            @foreach ($dataKategori as $item)
                                <option value="{{ $item->kategoriId }}">{{ $item->kasabianNamaKategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="kasabianStock" id="stock"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Stock Buku" required>
                    </div>

                    <div class="col-span-4">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-700">Deskripsi Buku</label>
                        <textarea id="deskripsi" name="kasabianDeskripsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-yellow focus:border-primary-yellow"
                            placeholder="Ketik Deskripsi" required></textarea>
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
                    Tambah Buku
                </button>
            </form>
        </x-slot>
    </x-crud-modal>

    @foreach ($dataBuku as $item)
        <x-crud-modal id="edit-modal{{ $item->bukuId }}">
            <x-slot name='header'>
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                    <h3 class="text-lg font-semibold text-primary-yellow">
                        Edit Buku
                    </h3>
                    <button type="button" id="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="edit-modal{{ $item->bukuId }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </x-slot>
            <x-slot name='body'>
                <form action="{{ route('editBuku', $item->bukuId) }}" class="p-4 md:p-5" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-4">
                        <div class="col-span-4">
                            <label for="judul" class="block mb-2 text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="kasabianJudul" id="judul"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                                value="{{ $item->kasabianJudul }}" placeholder="Ketik Judul" required>
                        </div>

                        <div class="col-span-2">
                            <label for="penulis" class="block mb-2 text-sm font-medium text-gray-700">Penulis</label>
                            <input type="text" name="kasabianPenulis" id="penulis"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                                value="{{ $item->kasabianPenulis }}" placeholder="Ketik Penulis" required>
                        </div>

                        <div class="col-span-2">
                            <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-700">Penerbit</label>
                            <input type="text" name="kasabianPenerbit" id="penerbit"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                                value="{{ $item->kasabianPenerbit }}" placeholder="Ketik Penerbit" required>
                        </div>

                        <div class="col-span-2">
                            <label for="gambar" class="block mb-2 text-sm font-medium text-gray-700">Gambar</label>
                            <input type="file" name="kasabianGambar" id="gambar"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5">
                        </div>

                        <div class="col-span-2">
                            <label for="tahunTerbit" class="block mb-2 text-sm font-medium text-gray-700">Tahun
                                Terbit</label>
                            <input type="number" name="kasabianTahunTerbit" id="tahunTerbit"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                                value="{{ $item->kasabianTahunTerbit }}" placeholder="Ketik Tahun Terbit" required>
                        </div>

                        <div class="col-span-2">
                            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Kategori</label>
                            <select name="kasabianKategori" id="kategori"
                                class="bg-white border border-gray-300 rounded-lg block w-full p-2.5">
                                @foreach ($dataKategori as $kategori)
                                    @if ($item->relasi->kategoriId == $kategori->kategoriId)
                                        <option value="{{ $kategori->kategoriId }}" selected hidden>
                                            {{ $kategori->kasabianNamaKategori }}</option>
                                    @endif
                                    <option value="{{ $kategori->kategoriId }}">{{ $kategori->kasabianNamaKategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">Stock</label>
                            <input type="number" name="kasabianStock" id="stock"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                                placeholder="Tambah Stock">
                        </div>

                        <div class="col-span-4">
                            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-700">Deskripsi
                                Buku</label>
                            <textarea id="deskripsi" name="kasabianDeskripsi" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-yellow focus:border-primary-yellow"
                                placeholder="Ketik Deskripsi" required>{{ $item->kasabianDeskripsi }}</textarea>
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
                        Edit Buku
                    </button>
                </form>
            </x-slot>
        </x-crud-modal>
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#bukuTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true,
            });
        });
    </script>
@endpush
