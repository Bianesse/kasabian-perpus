<div id="login-modal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="relative w-full max-w-xl bg-white shadow-lg rounded-lg p-6">


        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            data-modal-hide="login-modal">
            ✖
        </button>


        <h1 class="text-2xl font-semibold text-center text-gray-800">Login ke Akun Anda</h1>

        <form class="mt-6 space-y-4" method="POST" action="/login">
            @csrf
            <div>
                <label for="user" class="block text-sm font-medium text-gray-700">Username</label>
                <input name="kasabianUser" id="user" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="text" placeholder="Masukkan username">
            </div>

            <div>
                <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
                <input name="kasabianPass" id="pass" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="password" placeholder="Masukkan password">
            </div>

            <button type="submit"
                class="w-full text-white font-medium bg-blue-600 hover:bg-blue-700 rounded-lg py-2 transition">
                Sign in
            </button>
        </form>

        {{-- <div class="mt-4 text-center text-gray-600">
            <p>Belum punya akun? 
                <a href="{{ route('registerPage') }}" class="text-blue-600 font-medium hover:underline">Daftar di sini</a>
            </p>
        </div> --}}
    </div>
</div>
