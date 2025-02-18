<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>

    @stack('scripts')
    @stack('styles')

    <style>
        #dt-length-0 {
            width: 4rem
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col">
    <x-kasabian-navbar />

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK",
                confirmButtonColor: "#3b82f6 ",
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Error!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "OK",
                confirmButtonColor: "#3b82f6 ",
            });
        </script>
    @endif

    <div class="flex-grow">
        <header class="bg-transparent shadow print:hidden">
            <div class="mx-auto ms-5 px-4 py-6 sm:px-6 lg:px-8">
                @yield('head')
            </div>
        </header>

        <div class="w-full md:w-5/6 mx-auto mt-5 bg-gray-100 p-10 border-2 border-gray-200 rounded-lg">
            <div class="overflow-y-hidden">
                @yield('content')
            </div>
        </div>


        @hasSection('extra')
            @yield('extra')
        @endif
    </div>

    <x-footer />

</body>

</html>
