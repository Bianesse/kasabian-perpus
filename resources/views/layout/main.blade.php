<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>

    <style>
        @media print {
            .print-table {
                font-size: 10px;
                /* Reduce font size */
                width: 80% !important;
                /* Adjust table width */
                overflow: hidden !important;
                /* Hide scrollbars */
            }

            .print-table th,
            .print-table td {
                padding: 2px 4px !important;
                /* Reduce padding */
            }

            .print-table span {
                font-size: 8px !important;
                /* Reduce badge size */
                padding: 1px 3px !important;
            }

            /* Hide scrolling by ensuring no overflow */
            .overflow-y-hidden {
                overflow: hidden !important;
            }

            /* If inside a div with a fixed height, remove height for print */
            .table-container {
                max-height: none !important;
                overflow: hidden !important;
            }
        }
    </style>

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
            @yield('extra')
        @endif
    </div>

    <x-footer />

</body>

</html>
