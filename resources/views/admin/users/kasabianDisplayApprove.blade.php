@extends('layout.main')

@section('head')
    <h1 class="text-3xl font-bold tracking-tight text-primary-yellow">Approve User</h1>
@endsection

@section('content')
    <div class="flex flex-col">
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
                                <form method="POST" action="{{ route('approveUser', $item->id) }}">
                                    @csrf
                                    <button onclick="confirmApprove(event, this)"
                                        class="bg-green-500 rounded-lg w-20 h-10 font-medium my-2">
                                        Approve
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('rejectUser', $item->id) }}">
                                    @csrf
                                    <button onclick="confirmReject(event, this)"
                                        class="bg-red-500 rounded-lg w-20 h-10 font-medium my-2">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
