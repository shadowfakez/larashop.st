<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300">Add
                    to cart</a>
            </li>

            <li>
                <a class="font-semibold tracking-tight block cursor-pointer pl-48 p-2 hover:text-blue-500 transition-colors duration-300">Admin
                    panel</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

</body>
</html>
