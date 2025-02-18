@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">User</h1>
@endsection

@section('content')
    <div class="flex flex-col">
            @if ($userData->kasabianRoleId == 1)
                <button class="bg-green-500 rounded-lg w-20 h-10 font-medium mb-2" data-modal-toggle="insert-modal" data-modal-target="insert-modal">
                    Tambah
                </button>
            @endif
        <table class="w-full text-sm text-left text-gray-500 border border-gray-300 rounded-lg shadow-lg" id="userTable">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr class="text-left">
                    <th class="px-4 py-3">No.</th>
                    <th class="px-4 py-3">Username</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Nama Lengkap</th>
                    <th class="px-4 py-3">Alamat</th>
                    @if ($userData->kasabianRoleId == 1)
                        <th class="px-4 py-3">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($dataUser as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianUsername }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianEmail }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianRoles->kasabianRoleName }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianNamaLengkap }}</td>
                        <td class="px-4 py-3">{{ $item->kasabianAlamat }}</td>
                        @if ($userData->kasabianRoleId == 1)
                            <td class="px-4 py-3 flex flex-row space-x-2 text-white">
                                    <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2" data-modal-target="edit-modal{{ $item->id }}" data-modal-toggle="edit-modal{{ $item->id }}">
                                        Edit
                                    </button>
                                <form method="POST" action="{{ route('hapusUsers', $item->id) }}">
                                    @csrf
                                    <button onclick="confirmDelete(event, this)"
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
                    Tambah User
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
            <form action="{{ route('tambahUsers') }}" class="p-4 md:p-5" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-4">
                    <div class="col-span-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="kasabianUsername" id="username"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Username" required>
                    </div>
                
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="kasabianEmail" id="email"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Email" required>
                    </div>
                
                    <div class="col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="kasabianPassword" id="password"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Password" required>
                    </div>
                
                    <div class="col-span-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-700">Role</label>
                        <select name="kasabianRole" id="role"
                            class="bg-white border border-gray-300 rounded-lg block w-full p-2.5">
                            <option value="1">Admin</option>
                            <option value="2">Petugas</option>
                            <option value="3">Peminjam</option>
                        </select>
                    </div>
                
                    <div class="col-span-2">
                        <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="kasabianNamaLengkap" id="namaLengkap"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            placeholder="Ketik Nama Lengkap" required>
                    </div>
                
                    <div class="col-span-4">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="kasabianAlamat" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-yellow focus:border-primary-yellow"
                            placeholder="Ketik Alamat Lengkap" required></textarea>
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
                    Tambah User
                </button>
            </form>
        </x-slot>
    </x-crud-modal>

    @foreach ($dataUser as $item)
    <x-crud-modal id="edit-modal{{ $item->id }}">
        <x-slot name='header'>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-300">
                <h3 class="text-lg font-semibold text-primary-yellow">
                    Tambah User
                </h3>
                <button type="button" id="closeModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-toggle="edit-modal{{ $item->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </x-slot>
        <x-slot name='body'>
            <form action="{{route('editUsers', $item->id)}}" class="p-4 md:p-5" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-4">
                    <div class="col-span-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="kasabianUsername" id="username"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            value="{{$item->kasabianUsername}}" placeholder="Ketik Username" required>
                    </div>
                
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="kasabianEmail" id="email"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            value="{{$item->kasabianEmail}}" placeholder="Ketik Email" required>
                    </div>
                
                    <div class="col-span-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-700">Role</label>
                        <select name="kasabianRole" id="role"
                            class="bg-white border border-gray-300 rounded-lg block w-full p-2.5">
                            <option value="{{$item->kasabianRoles->id}}" selected readonly hidden>
                                {{$item->kasabianRoles->kasabianRoleName}}</option>
                            <option value="1">Admin</option>
                            <option value="2">Petugas</option>
                            <option value="3">Peminjam</option>
                        </select>
                    </div>
                
                    <div class="col-span-4">
                        <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="kasabianNamaLengkap" id="namaLengkap"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                            value="{{ $item->kasabianNamaLengkap }}" placeholder="Ketik Nama Lengkap" required>
                    </div>
                
                    <div class="col-span-4">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="kasabianAlamat" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-yellow focus:border-primary-yellow"
                            placeholder="Ketik Alamat Lengkap" required>{{ $item->kasabianAlamat }}</textarea>
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
                    Tambah User
                </button>
            </form>
        </x-slot>
    </x-crud-modal>
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true,
            });
        });
    </script>
@endpush
