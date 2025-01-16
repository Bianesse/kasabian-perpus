@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Edit User</h1>
@endsection

@section('content')
    <div>
        <form action="{{route('editUsers', $dataUser->id)}}" method="POST">
            @csrf
            <div class="grid gap-4 mb-4 grid-cols-4">

                <div class="col-span-2">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="kasabianUsername" id="username"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        value="{{$dataUser->kasabianUsername}}" placeholder="Ketik Username" required>
                </div>

                <div class="col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="kasabianEmail" id="email"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        value="{{$dataUser->kasabianEmail}}" placeholder="Ketik Email" required>
                </div>

                <div class="col-span-2">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-700">Role</label>
                    <select name="kasabianRole" id="role" class="bg-white border border-gray-300  rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5">
                        <option value="{{$dataUser->kasabianRoles->id}}" selected readonly hidden>
                            {{$dataUser->kasabianRoles->kasabianRoleName}}</option>
                        <option value="1">Admin</option>
                        <option value="2">Petugas</option>
                        <option value="3">Peminjam</option>
                    </select>
                </div>

                <div class="col-span-2">
                    <label for="namaLengkap" class="block mb-2 text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="kasabianNamaLengkap" id="namaLengkap"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        value="{{$dataUser->kasabianNamaLengkap}}" placeholder="Ketik Nama Lengkap" required>
                </div>

                <div class="col-span-4">
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="kasabianAlamat" id="alamat"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-yellow focus:border-primary-yellow block w-full p-2.5"
                        placeholder="Ketik Alamat Lengkap" required>{{$dataUser->kasabianAlamat}}</textarea>
                </div>
                
                
                <div class="col-span-4">
                    <button class="bg-green-500 rounded-lg w-full h-10 font-medium border-2 border-green-700">
                        Submit
                    </button>
                </div>

            </div>
        </form>
    </div>
@endsection
