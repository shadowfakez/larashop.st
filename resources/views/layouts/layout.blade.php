<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--<script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>--}}
    <style>
        #menu-toggle:checked + #menu {
            display: block;
        }
    </style>
</head>
{{--<body>
<nav class="bg-gradient-to-r from-rose-600 to-fuchsia-200 dark:bg-black dark:text-white flex flex-col md:flex-row items-center md:justify-between px-6 py-4 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
    <!-- Logo -->
    <div>
        <h2 class="text-3xl font-bold">
            <a href="{{ route('home') }}"><span class="text-blue-800">Lara</span>shop</a>
        </h2>
    </div>
    <!-- /End Logo -->
    <div class="mt-5 md:mt-0">
        <ul class="grid grid-cols-6 md:flex-row md:space-x-5 ">
            <li>
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300"
                   href="{{ route('products.index') }}">Products</a>
            </li>
            <li>
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300"
                   href="{{ route('categories.index') }}">Categories</a>
            </li>
            <li>
                <a class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300"
                   href="{{ route('cart') }}">Cart</a>
            </li>

            @if (Route::has('login'))
                @auth
                    <li class="col-start-5 col-end-7 flex">
                    <span  class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300 flex-1">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300" type="submit">Logout</button>
                    </form>
                </li>
            @else
                <li class="col-start-5 col-end-7 flex">
                    <a href="{{ route('login') }}" class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300 flex-1">Login</a>
                    <a href="{{ route('register') }}" class="font-semibold tracking-tight block cursor-pointer p-2 hover:text-blue-500 transition-colors duration-300 flex-1">Register</a>
                </li>
                @endauth
            @endif

        </ul>
    </div>
</nav>
@if($errors->any())
    @foreach($errors->all() as $error)
        <div
            class="flex flex-col md:flex-row items-center md:justify-between border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto text-red-100 shadow-inner rounded p-3 bg-red-600">
            <p class="self-center">{{ $error }}</p>
            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
        </div>

    @endforeach
@endif
@if (session('added') or session('confirm'))
    <div
        class="flex flex-col md:flex-row items-center md:justify-between border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto text-emerald-100 shadow-inner rounded p-3 bg-emerald-600">

        <p class="self-center">
            {{ session('added') }}
            {{ session('confirm') }}
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>

    </div>
@elseif (session('removed'))
    <div
        class="flex flex-col md:flex-row items-center md:justify-between border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto text-red-100 shadow-inner rounded p-3 bg-red-600">

        <p class="self-center">
            {{ session('removed') }}
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>

    </div>
@endif

@yield('content')

<script>
    let alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
            x.parentElement.classList.add('hidden');
        })
    );
</script>
</body>--}}
<body class="antialiased bg-gray-200">
<header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
    <div class="flex-1 flex justify-between items-center">
        <a href="{{ route('home') }}"><span class="text-blue-800">Lara</span>shop</a>
    </div>

    <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
        <nav>
            <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 hover:bg-indigo-100" href="{{ route('products.index') }}">Products</a></li>
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 hover:bg-indigo-100" href="{{ route('categories.index') }}">Categories</a></li>
                <li><a class="lg:p-4 py-3 mr-48 px-0 block border-b-2 border-transparent hover:border-indigo-400 hover:bg-indigo-100" href="{{ route('cart') }}">Cart</a></li>
                {{--<li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2" href="#">Support</a></li>--}}
                @if (Route::has('login'))
                    @auth

                        <span  class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100">{{ Auth::user()->name }}</span>
                        </li>
                        <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100" type="submit">Logout</button>
                        </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100">Register</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
</header>
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="flex flex-row items-center justify-between border-b border-indigo-100 shadow-sm mx-auto shadow-inner rounded p-3 bg-red-200 hover:border-indigo-200">
            <p class="self-center">{{ $error }}</p>
            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
        </div>
    @endforeach
@endif
@if (session('success'))
    <div
        class="flex flex-row items-center justify-between border-b border-indigo-100 shadow-sm mx-auto shadow-inner rounded p-3 bg-green-200 hover:border-indigo-200">
        <p class="self-center">
            {{ session('success') }}
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div>
@endif

<div class="lg:p-4 py-3 px-0 block shadow-sm lg:mb-0 mb-2 mt-2">
    <h1 class="text-center text-3xl font-bold">@yield('header')</h1>
</div>

@yield('content')

<script>
    let alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function () {
            x.parentElement.classList.add('hidden');
        })
    );
</script>
</body>
</html>

