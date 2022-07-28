<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@lang('main.online_shop')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #menu-toggle:checked + #menu {
            display: block;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="antialiased bg-gray-200">
<header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
    <div class="flex-1 flex justify-between items-center">
        <a href="{{ route('home') }}"><span class="text-blue-800">Lara</span>shop</a>
    </div>

    <label for="menu-toggle" class="pointer-cursor lg:hidden block">
        <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
             viewBox="0 0 20 20"><title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle"/>

    <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
        <nav>
            <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                <li>
                    <a class="lg:p-4 h-full px-0 block border-b-2 border-transparent hover:border-indigo-400 hover:bg-indigo-100 @layoutActiveRoute('products*')"
                       href="{{ route('products.index') }}">{{ __('main.products') }}</a></li>
                <li>
                    <a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 hover:bg-indigo-100 @layoutActiveRoute('categor*')"
                       href="{{ route('categories.main') }}">Categories</a></li>
                <li>
                    <a class="lg:p-4 py-3 mr-48 px-0 block border-b-2 border-transparent hover:border-indigo-400 hover:bg-indigo-100 @layoutActiveRoute('cart*')"
                       href="{{ route('cart') }}">Cart</a></li>
                <li>
                    <a class="py-2 px-4 block border-b-2 border-indigo-400 bg-gradient-to-b from-indigo-200 via-cyan-100 to-blue-200 hover:bg-indigo-100"
                       href="{{ route('locale', __('main.set_lang')) }}">{{ __('main.current_lang') }}</a></li>
                @if (Route::has('login'))
                    @auth
                        <li>
                            <div class="dropdown inline-block relative">
                                <button
                                    class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100 inline-flex items-center lg:justify-center justify-start w-36">
                                    <span class="mr-1">{{ Auth::user()->name }}</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </button>
                                <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 w-36 bg-white">
                                    <li class="hover:bg-indigo-100 py-2 px-4 block whitespace-no-wrap">
                                        <a class="" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    @if (Auth::user()->isAdmin())
                                        <li class="hover:bg-indigo-100 py-2 px-4 block whitespace-no-wrap">
                                            <a href="{{ route('admin.home') }}">Admin Panel</a>
                                        </li>
                                    @endif
                                    <li class="text-blue-800 hover:bg-blue-800 hover:text-white py-2 px-4 block whitespace-no-wrap">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                               class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                               class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 text-blue-800 hover:bg-indigo-100">Register</a>
                        </li>
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
</header>
@if($errors->any())
    @foreach($errors->all() as $error)
        <div
            class="flex flex-row items-center justify-between border-b border-indigo-100 shadow-sm mx-auto shadow-inner rounded p-3 bg-red-200 hover:border-indigo-200">
            <p class="self-center"><b>Error! </b>{{ $error }}</p>
            <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
        </div>
    @endforeach
@endif
@if (session('success'))
    <div
        class="flex flex-row items-center justify-between border-b border-indigo-100 shadow-sm mx-auto shadow-inner rounded p-3 bg-green-200 hover:border-indigo-200">
        <p class="self-center">
            <b>Success! </b>{{ session('success') }}
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div>
@endif

@if (session('warning'))
    <div
        class="flex flex-row items-center justify-between border-b border-indigo-100 shadow-sm mx-auto shadow-inner rounded p-3 bg-yellow-200 hover:border-indigo-200">
        <p class="self-center">
            <b>Warning! </b>{{ session('warning') }}
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

