@extends('layouts.layout')

@section('header')
    @yield('header')
@endsection

@section('content')


    <div class="flex flex-no-wrap">
        <div class="w-64 bg-gray-900 shadow flex-col justify-between hidden sm:flex">
            <div class="px-8">
                <ul class="mt-12">
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 hover:text-gray-100 @adminLayoutActiveRoute('admin.home')">
                        <a href="{{ route('admin.home') }}" class="flex items-center focus:outline-none">
                            <span class="ml-2">Home</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 hover:text-gray-100 @adminLayoutActiveRoute('admin.orders*')">
                        <a href="{{ route('admin.orders.index') }}" class="flex items-center focus:outline-none">
                            <span class="ml-2">Orders</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 hover:text-gray-100 @adminLayoutActiveRoute('admin.product*', 'admin.sku*')">
                        <a href="{{ route('admin.products.index') }}" class="flex items-center focus:outline-none">
                            <span class="ml-2">Products</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 hover:text-gray-100 @adminLayoutActiveRoute('admin.categories*')">
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center focus:outline-none">
                            <span class="ml-2">Categories</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 hover:text-gray-100 @adminLayoutActiveRoute('admin.propert*')">
                        <a href="{{ route('admin.properties.index') }}" class="flex items-center focus:outline-none">
                            <span class="ml-2">Properties</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between cursor-pointer items-center mb-6 mt-24 hover:text-gray-100 @adminLayoutActiveRoute('dashboard')">
                        <a href="{{ route('dashboard') }}" class="flex items-center focus:outline-none">
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container mx-6">
            @yield('admin-content')
        </div>

    </div>
@endsection



