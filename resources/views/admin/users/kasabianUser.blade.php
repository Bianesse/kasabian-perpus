@extends('layout.main')

@section('head')
<h1 class="text-3xl font-bold tracking-tight text-primary-yellow">User</h1>

@endsection

@section('content')
    <table class="w-4/6 mx-auto divide-y divide-gray-300 border">
        <thead class="bg-gray-50">
            <tr class="text-left">
                <th>No.</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($userData as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $item->kasabianUsername }}</td>
                <td>{{ $item->kasabianEmail }}</td>
                <td>{{ $item->kasabianRoles->kasabianRoleName }}</td>
                <td>{{ $item->kasabianNamaLengkap }}</td>
                <td>{{ $item->kasabianAlamat }}</td>
                <td>
                    <button class="bg-blue-500 rounded-lg w-20 h-10 font-medium my-2">
                        Edit
                    </button>
                    <button class="bg-red-500 rounded-lg w-20 h-10 font-medium my-2">
                        Hapus
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
