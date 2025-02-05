<nav class="w-full h-14 bg-yellow-400 z-50">
    <div class="flex justify-between items-center px-4 md:px-8 h-full">
        <!-- Left Section -->
        <div class="flex items-center">
            <a class="font-medium text-lg" href="{{ route('main') }}">Perpustakaan</a>

            <!-- Desktop Menu (Hidden on small screens) -->
            <div class="hidden md:flex space-x-4 ml-10">
                @if ($userData->kasabianRoleId == 1)
                    <a class="font-medium" href="{{ route('book') }}">Buku</a>
                    <a class="font-medium" href="{{ route('kategori') }}">Kategori</a>
                    <a class="font-medium" href="{{ route('users') }}">User</a>
                    <a class="font-medium" href="{{ route('showLog') }}">Logs Peminjaman</a>
                    <a class="font-medium" href="{{ route('adminPeminjaman') }}">Peminjaman</a>
                @elseif ($userData->kasabianRoleId == 2)
                    <a class="font-medium" href="{{ route('book') }}">Buku</a>
                    <a class="font-medium" href="{{ route('kategori') }}">Kategori</a>
                    <a class="font-medium" href="{{ route('users') }}">User</a>
                    <a class="font-medium" href="{{ route('showLog') }}">Logs Peminjaman</a>
                    <a class="font-medium" href="{{ route('adminPeminjaman') }}">Peminjaman</a>
                @elseif ($userData->kasabianRoleId == 3)
                    <a class="font-medium" href="{{ route('peminjamHome') }}">Buku</a>
                    <a class="font-medium" href="{{ route('displayPinjam') }}">Peminjaman</a>
                    <a class="font-medium" href="{{ route('koleksiPribadi') }}">Koleksi Pribadi</a>
                @endif
            </div>
        </div>

        <!-- Right Section: Username & Logout -->
        <div class="hidden md:flex items-center space-x-4">
            <h1 class="text-gray-800">{{ $userData->kasabianUsername }}</h1>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="bg-gray-200 font-medium text-red-700 rounded-lg w-20 h-10 hover:bg-gray-300 transition">
                    Logout
                </button>
            </form>
        </div>

        <!-- Hamburger Button (Mobile Only) -->
        <button id="menu-toggle" class="md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (Hidden by Default) -->
    <div id="mobile-menu" class="hidden md:hidden flex flex-col bg-yellow-300 py-4 px-4 space-y-2 z-50">
        @if ($userData->kasabianRoleId == 1)
            <a class="font-medium" href="{{ route('book') }}">Buku</a>
            <a class="font-medium" href="{{ route('kategori') }}">Kategori</a>
            <a class="font-medium" href="{{ route('users') }}">User</a>
            <a class="font-medium" href="{{ route('showLog') }}">Logs Peminjaman</a>
            <a class="font-medium" href="{{ route('adminPeminjaman') }}">Peminjaman</a>
        @elseif ($userData->kasabianRoleId == 2)
            <a class="font-medium" href="{{ route('book') }}">Buku</a>
            <a class="font-medium" href="{{ route('kategori') }}">Kategori</a>
            <a class="font-medium" href="{{ route('users') }}">User</a>
        @elseif ($userData->kasabianRoleId == 3)
            <a class="font-medium" href="{{ route('peminjamHome') }}">Buku</a>
            <a class="font-medium" href="{{ route('displayPinjam') }}">Peminjaman</a>
            <a class="font-medium" href="{{ route('koleksiPribadi') }}">Koleksi Pribadi</a>
        @endif

        <!-- Mobile Logout -->
        <div class="border-t border-gray-400 pt-2">
            <h1 class="text-gray-800">{{ $userData->kasabianUsername }}</h1>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="w-full bg-gray-200 text-red-700 rounded-lg py-2 hover:bg-gray-300 transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- JavaScript for Mobile Menu -->
<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
</script>
