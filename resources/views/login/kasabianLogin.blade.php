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

<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Perpustakaan Digital</h1>

    <div class="bg-white shadow-lg rounded-lg p-8 w-1/3">
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

        @if ($errors->has('message'))
        <div class="mt-4 text-red-600 bg-red-100 p-3 rounded border border-red-300">
            {{ $errors->first('message') }}
        </div>
        @endif

        <div class="mt-4 text-center text-gray-600">
            <p>Belum punya akun? 
                <a href="{{ route('registerPage') }}" class="text-blue-600 font-medium hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>



</html>
