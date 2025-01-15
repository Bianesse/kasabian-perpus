@extends('layout.main')

@section('head')
@endsection

@section('content')
    <table class="w-2/3 divide-y m-5 mx-auto divide-gray-300 border">
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Action</th>
        </tr>
        @foreach ($dataBuku as $item)
            <tr>
                <td>{{ $item->kasabianJudul }}</td>
                <td>
                    @foreach ($item->relasi as $data)
                        @foreach ( $data->kategori as $kategori)
                            {{ $kategori->kasabianNamaKategori }},
                        @endforeach
                    @endforeach
                </td>
                <td>{{ $item->kasabianPenulis }}</td>
                <td>{{ $item->kasabianPenerbit }}</td>
                <td>{{ $item->kasabianTahunTerbit }}</td>
                <td>Edit</td>
            </tr>
        @endforeach
    </table>
@endsection
