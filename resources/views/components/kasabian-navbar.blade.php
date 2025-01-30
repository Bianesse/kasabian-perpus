<nav class="w-full h-14 bg-yellow-400">
    <div class="flex flex-row">
        <section class="flex flex-row p-4">
            <a class="mr-24 font-medium" href="{{route('main')}}">Perpustakaan</a>
            @if ($userData->kasabianRoleId == 1)
            <a class="mr-4 font-medium" href="{{route('book')}}">Buku</a>
            <a class="mr-4 font-medium" href="{{route('kategori')}}">Kategori</a>
            <a class="mr-4 font-medium" href="{{route('users')}}">User</a>
            @elseif ($userData->kasabianRoleId == 2)
            <a class="mr-4 font-medium" href="{{route('book')}}">Buku</a>
            <a class="mr-4 font-medium" href="{{route('kategori')}}">Kategori</a>
            <a class="mr-4 font-medium" href="{{route('users')}}">User</a>
            @elseif ($userData->kasabianRoleId == 3)
            <a class="mr-4 font-medium" href="{{route('peminjamHome')}}">Buku</a>
            <a class="mr-4 font-medium" href="{{route('displayPinjam')}}">Peminjaman</a>
            <a class="mr-4 font-medium" href="{{route('koleksiPribadi')}}">Koleksi Pribadi</a>

            @else

            @endif
        </section>
        <form method="POST" action="/logout" class="ml-auto flex items-center space-x-4 mr-4 font-medium">
            @csrf
            <h1 class="text-gray-800">{{ $userData->kasabianUsername }}</h1>

            <button type="submit" class="bg-gray-200 font-medium text-red-700 rounded-lg w-20 h-10 hover:bg-gray-300 transition">
                Logout
            </button>
        </form>

    </div>
</nav>
