<div id="register-modal" tabindex="-1" aria-hidden="true"
    class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="relative w-full max-w-xl bg-white shadow-lg rounded-lg p-6">

        <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600"
            data-modal-hide="register-modal">
            ✖
        </button>

        <h1 class="text-2xl font-semibold text-center text-gray-800">Buat Akun Baru</h1>

        <form class="mt-6 space-y-4" method="POST" action="/register">
            @csrf

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input name="username" id="username" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="text" placeholder="Masukkan username">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input name="email" id="email" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="email" placeholder="example@email.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input name="password" id="password" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="password" placeholder="Masukkan password">
            </div>

            <div>
                <label for="password2" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input name="password2" id="password2" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="password" placeholder="Konfirmasi password">
            </div>

            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input name="full_name" id="full_name" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="text" placeholder="Nama Lengkap">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="address" id="address" required
                    class="w-full border border-gray-300 rounded-lg p-2 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Alamat lengkap"></textarea>
            </div>

            <button type="submit"
                class="w-full text-white font-medium bg-blue-600 hover:bg-blue-700 rounded-lg py-2 transition">
                Register
            </button>
        </form>

        

    </div>
</div>
