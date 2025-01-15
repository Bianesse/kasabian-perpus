@extends('layout.main')

@section('head')
    
@endsection

@section('content')
<table class="w-1/2 divide-y m-5 mx-auto divide-gray-300 border">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Action</th>
    </tr>
    @foreach ($userData as $item)
        <tr>
            <td>{{$item->kasabianUsername}}</td>
        <td>{{$item->kasabianEmail}}</td>
        <td>{{$item->kasabianRoles->kasabianRoleName}}</td>
        <td>{{$item->kasabianNamaLengkap}}</td>
        <td>{{$item->kasabianAlamat}}</td>
        <td>Edit</td>
        </tr>
    @endforeach
</table>
@endsection