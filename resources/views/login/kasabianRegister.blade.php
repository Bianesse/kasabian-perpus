<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="module" src="{{ asset('assets/js/login.js') }}"></script>

    <title>Login</title>
    <style>

    </style>
</head>

<body class="text-white">
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="bg-gray-200 border border-gray-600 w-1/3 rounded-md p-5">
            <h1 class="p-2 text-lg text-gray-800 text-center font-bold">Buat Akun Baru</h1>

            <div class="space-y-3">
                <form class="space-y-3" method="POST" action="/register">
                    @csrf
                    <label for="username" class="text-sm font-medium text-gray-800">Username</label>
                    <input name="username" id="username" required
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="text"
                        placeholder="Username">

                    <label for="email" class="text-sm font-medium text-gray-800">Email</label>
                    <input name="email" id="email" required
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="email"
                        placeholder="example@email.com">

                    <label for="password" class="text-sm font-medium text-gray-800">Password</label>
                    <input name="password" id="password" required
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="password"
                        placeholder="********">

                    <label for="password2" class="text-sm font-medium text-gray-800">Confirm Password</label>
                    <input name="password2" id="password2" required
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="password"
                        placeholder="********">

                    <label for="full_name" class="text-sm font-medium text-gray-800">Nama Lengkap</label>
                    <input name="full_name" id="full_name" required
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="text"
                        placeholder="Nama Lengkap">

                    <label for="address" class="text-sm font-medium text-gray-800">Alamat</label>
                    <textarea name="address" id="address" required
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" placeholder="Alamat lengkap"></textarea>

                    <button type="submit"
                        class="w-max text-gray-800 font-medium bg-gray-300 border-2 border-gray-400 rounded-lg px-3 py-2">
                        Register
                    </button>
                </form>
            </div>

            @if ($errors->has('message'))
                <div class="mt-4 text-red-600 bg-red-50 p-3 rounded border border-red-200">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>

        <!-- Login Redirect -->
        <div class="mt-3 text-gray-700">
            <p>Sudah punya akun? <a href="/login" class="text-blue-600 font-medium hover:underline">Login di sini</a>
            </p>
        </div>
    </div>


</body>

</html>
