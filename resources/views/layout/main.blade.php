<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>

    @vite('resources/css/app.css')

<body class="min-h-screen flex flex-col">
    <x-kasabian-navbar />

    <div class="flex-grow">
        <header class="bg-transparent shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('head')
            </div>
        </header>

        <div class="w-5/6 mx-auto mt-5 bg-gray-100 p-10 border-2 border-gray-200 rounded-lg">
            <div class="overflow-y-hidden">
                @yield('content')
            </div>
        </div>

        @hasSection('extra')
            <div class="w-5/6 mx-auto mt-5 bg-gray-100 p-10 border-2 border-gray-200 rounded-lg">
                @yield('extra')
            </div>
        @endif
    </div>

    <x-footer />

</body>

</html>
