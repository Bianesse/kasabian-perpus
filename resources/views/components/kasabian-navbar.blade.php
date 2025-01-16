<nav class="w-full h-14 bg-yellow-400">
    <div class="flex flex-row">
        <section class="flex flex-row p-4">
            <h1 class="mr-24 font-medium">Perpustakaan</h1>

            <a class="mr-4 font-medium" href="{{route('book')}}">Buku</a>
            <a class="mr-4 font-medium" href="{{route('kategori')}}">Kategori</a>
            <a class="mr-4 font-medium" href="{{route('users')}}">User</a>
        </section>

        <section class="p-4">
        </section>          
        <form method="POST" action="/logout" class="ml-auto mt-2 mr-4 font-medium">
            @csrf
            <button type="submit" class="bg-gray-200 font-medium text-red-700 rounded-lg w-20 h-10">Logout</button>
        </form>
    </div>
</nav>

{{-- <div class="h-screen fixed top-0 left-0 z-40 w-1/5 bg-white">
    <div class="flex flex-col">
        <h1 class="m-4 text-xl font-medium">Perpustakaan</h1>

        <ul class="space-y-4 text-lg">
            <li><a class="mr-4 font-medium" href="">Buku</a></li>
            <hr class="w-3/4 mx-auto">
            <li><a class="mr-4 font-medium" href="">Kategori</a></li>
            <li><a class="mr-4 font-medium" href="">User</a></li>
        </ul>
    </div>
</div> --}}