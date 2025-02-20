<nav class="w-full h-16 bg-yellow-400 shadow-md z-40 print:hidden">
    <div class="flex justify-between items-center px-6 md:px-12 h-full">
        <!-- Left Section -->
        <div class="flex items-center space-x-6">
            <a class="text-2xl font-semibold text-gray-800" href="{{ route('main') }}">Perpustakaan</a>

            <!-- Desktop Menu -->
            @auth
                <div class="hidden md:flex space-x-6">
                    @if ($userData->kasabianRoleId == 1 || $userData->kasabianRoleId == 2)
                        <a class="nav-link" href="{{ route('book') }}">Buku</a>
                        <a class="nav-link" href="{{ route('kategori') }}">Kategori</a>
                        <a class="nav-link" href="{{ route('users') }}">User</a>
                        <a class="nav-link" href="{{ route('adminPeminjaman') }}">Peminjaman</a>
                        <a class="nav-link" href="{{ route('displayApprove') }}">Approve User</a>
                    @elseif ($userData->kasabianRoleId == 3)
                        <a class="nav-link" href="{{ route('peminjamHome') }}">Buku</a>
                        <a class="nav-link" href="{{ route('displayPinjam') }}">Peminjaman</a>
                        <a class="nav-link" href="{{ route('koleksiPribadi') }}">Koleksi Pribadi</a>
                    @endif
                </div>
            @endauth
        </div>

        <!-- Right Section: Username & Logout for Authenticated Users -->
        @auth
            <div class="hidden md:flex items-center space-x-4">
                <span class="text-gray-800 font-medium">{{ $userData->kasabianUsername }}</span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" onclick="confirmLogout(event, this)"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

        <!-- Right Section: Login & Register for Guests -->
        @guest
            <div class="hidden md:flex items-center space-x-4">
                <button
                    class="px-4 py-2 border-2 border-blue-500 text-blue-500 bg-transparent rounded-lg transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white"
                    data-modal-target="login-modal" data-modal-toggle="login-modal">
                    Login
                </button>
                <button
                    class="px-4 py-2 border-2 border-green-600 text-green-600 bg-transparent rounded-lg transition duration-300 ease-in-out hover:bg-green-600 hover:text-white"
                    data-modal-target="register-modal" data-modal-toggle="register-modal">
                    Register
                </button>
            </div>

        @endguest

        <!-- Mobile Menu Button -->
        <button id="menu-toggle" class="md:hidden focus:outline-none print:hidden">
            <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu (Slide in) -->
    <div id="mobile-menu"
        class="fixed inset-y-0 right-0 w-64 bg-yellow-300 shadow-lg transform translate-x-full transition-transform md:hidden">
        <div class="p-6 flex flex-col space-y-4 relative">

            <!-- Close Button -->
            <button id="close-menu" class="absolute top-4 right-4 text-gray-800 hover:text-gray-900 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            @auth
                @if ($userData->kasabianRoleId == 1 || $userData->kasabianRoleId == 2)
                    <a class="nav-link-mobile" href="{{ route('book') }}">Buku</a>
                    <a class="nav-link-mobile" href="{{ route('kategori') }}">Kategori</a>
                    <a class="nav-link-mobile" href="{{ route('users') }}">User</a>
                    <a class="nav-link-mobile" href="{{ route('adminPeminjaman') }}">Peminjaman</a>
                    <a class="nav-link" href="{{ route('displayApprove') }}">Approve User</a>
                @elseif ($userData->kasabianRoleId == 3)
                    <a class="nav-link-mobile" href="{{ route('peminjamHome') }}">Buku</a>
                    <a class="nav-link-mobile" href="{{ route('displayPinjam') }}">Peminjaman</a>
                    <a class="nav-link-mobile" href="{{ route('koleksiPribadi') }}">Koleksi Pribadi</a>
                @endif
            @endauth

            <!-- Mobile Login & Register for Guests -->
            @guest
                <div class="flex flex-col border-gray-400 pt-4 space-y-3">
                    <button
                        class="px-4 py-2 border-2 border-blue-500 text-blue-500 bg-transparent rounded-lg transition duration-300 ease-in-out hover:bg-blue-500 hover:text-white"
                        data-modal-target="login-modal" data-modal-toggle="login-modal">
                        Login
                    </button>
                    <button
                        class="px-4 py-2 border-2 border-green-600 text-green-600 bg-transparent rounded-lg transition duration-300 ease-in-out hover:bg-green-600 hover:text-white"
                        data-modal-target="register-modal" data-modal-toggle="register-modal">
                        Register
                    </button>
                </div>
            @endguest

            <!-- Mobile Logout -->
            @auth
                <div class="border-t border-gray-400 pt-4">
                    <span class="text-gray-800">{{ $userData->kasabianUsername }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" onclick="confirmLogout(event, this)"
                            class="w-full bg-red-600 text-white rounded-lg py-2 hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>

@guest
    <x-login-modal id="login-modal" />
    <x-register-modal id="register-modal" />
@endguest

<!-- JavaScript for Mobile Menu -->
<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.remove("translate-x-full");
    });

    document.getElementById("close-menu").addEventListener("click", function() {
        document.getElementById("mobile-menu").classList.add("translate-x-full");
    });
</script>

<!-- Tailwind Styles for Links -->
<style>
    .nav-link {
        @apply text-gray-800 font-medium hover:text-gray-900 transition;
    }

    .nav-link-mobile {
        @apply block text-gray-800 font-medium py-2 hover:text-gray-900 transition;
    }
</style>
