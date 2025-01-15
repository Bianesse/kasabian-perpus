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
        @if ($errors->has('message'))
            <div class="mb-4 text-red-600 bg-red-50 p-3 rounded border border-red-200">
                {{ $errors->first('message') }}
            </div>
        @endif
        <div class="bg-gray-200 border border-gray-600 w-1/3 rounded-md p-5">
            <h1 class="p-2 text-lg text-gray-800 text-center font-bold">Login ke akun anda</h1>

            <div class="">
                <form class="space-y-3" method="POST" action="/login">
                    @csrf
                    <label for="user" class="text-sm font-medium text-gray-800">Username</label>
                    <input name="kasabianUser" id="user"
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="text" placeholder="Example">
                    <label for="pass" class="block text-sm font-medium text-gray-800">Password</label>
                    <input name="kasabianPass" id="pass"
                        class="bg-white border text-gray-500 border-gray-600 w-full rounded-md p-1 pl-2" type="password" placeholder="********">
                    <button type="submit"
                        class="w-max text-gray-800 font-medium bg-yellow-400 rounded-lg px-3 py-2">Sign in</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
