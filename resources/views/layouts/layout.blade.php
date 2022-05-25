<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
</head>
<body>
<nav class="bg-gradient-to-r from-rose-600 to-fuchsia-200 dark:bg-black dark:text-white flex flex-col md:flex-row items-center md:justify-between px-6 py-4 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
    <!-- Logo -->
    <div>
        <h2 class="text-3xl font-bold">
            <a href="{{ route('home') }}"><span class="text-blue-800">Lara</span>shop</a>
        </h2>
    </div>
    <!-- /End Logo -->
    <div class="mt-5 md:mt-0">
        <ul class="flex flex-col md:flex-row md:space-x-5 w-full items-center">
            <li>
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300" href="{{ route('products.index') }}">Products</a>
            </li>
            <li>
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300" href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li>
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300" href="{{ route('cart') }}">Cart</a>
            </li>

            <li>
                <a class="font-semibold tracking-tight block cursor-pointer pl-48 p-2 hover:text-blue-500 transition-colors duration-300">Admin
                    panel</a>
            </li>
        </ul>
    </div>
</nav>
@if (session('added') or session('confirm'))
    <div class="flex flex-col md:flex-row items-center md:justify-between border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto text-emerald-100 shadow-inner rounded p-3 bg-emerald-600">

            <p class="self-center">
                {{ session('added') }}
                {{ session('confirm') }}
            </p>
            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>

    </div>
@elseif (session('removed'))
    <div class="flex flex-col md:flex-row items-center md:justify-between border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto text-red-100 shadow-inner rounded p-3 bg-red-600">

            <p class="self-center">
                {{ session('removed') }}
            </p>
            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>

    </div>
@endif

@yield('content')

<script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
            x.parentElement.classList.add('hidden');
        })
    );
</script>
</body>
</html>
