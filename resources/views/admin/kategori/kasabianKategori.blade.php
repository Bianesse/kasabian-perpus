@extends('layout.main')

@section('head')
    
@endsection

@section('content')
<table class="w-2/3 divide-y m-5 mx-auto divide-gray-300 border">
    <tr>
        <th>Nama Kategori</th>
        <th>Buku</th>
        <th>Action</th>
    </tr>
    @foreach ($dataKategori as $item)
        <tr>
            <td>{{ $item->kasabianNamaKategori }}</td>
            <td>
                @foreach ($item->relasi as $data)
                    @foreach ( $data->books as $buku)
                        {{ $buku->kasabianJudul }},
                    @endforeach
                @endforeach
            </td>
            <td>Edit</td>
        </tr>
    @endforeach
</table>
@endsection