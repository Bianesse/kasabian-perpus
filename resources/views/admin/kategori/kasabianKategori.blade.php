@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Kategori buku</h1>
@endsection

@section('content')
    <div class="flex flex-col">
        @if ($userData->kasabianRoleId == 1)
            <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2" data-modal-toggle="insert-modal"
                data-modal-target="insert-modal">
                Tambah
            </button>
        @endif
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
                                    <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2" data-modal-target="edit-modal{{ $item->kategoriId }}" data-modal-toggle="edit-modal{{ $item->kategoriId }}">
                                        Edit
                                    </button>
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

    <x-crud-modal id="insert-modal">
        <x-slot name='header'>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                <h3 class="text-lg font-semibold text-primary-yellow">
                    Tambah Kategori
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
            <form action="{{ route('tambahKategori') }}" class="p-4 md:p-5" method="POST"">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-4">
                    <div class="col-span-4">
                        <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Nama Kategori</label>
                        <input type="text" name="kasabianKategori" id="kategori"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Kategori" required>
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
                    Tambah Kategori
                </button>
            </form>
        </x-slot>
    </x-crud-modal>

    @foreach ($dataKategori as $item)
        <x-crud-modal id="edit-modal{{ $item->kategoriId }}">
            <x-slot name='header'>
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                    <h3 class="text-lg font-semibold text-primary-yellow">
                        Edit Kategori
                    </h3>
                    <button type="button" id="closeModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="edit-modal{{ $item->kategoriId }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </x-slot>
            <x-slot name='body'>
                <form action="{{ route('editKategori', $item->kategoriId) }}" class="p-4 md:p-5" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-4">
                        <div class="col-span-4">
                            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-700">Nama Kategori</label>
                            <input type="text" name="kasabianKategori" id="kategori"
                                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                                value="{{ $item->kasabianNamaKategori }}" placeholder="Ketik Kategori" required>
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
                        Tambah Kategori
                    </button>
                </form>
            </x-slot>
        </x-crud-modal>
    @endforeach
@endsection
