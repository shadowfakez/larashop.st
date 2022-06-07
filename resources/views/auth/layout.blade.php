@extends('layouts.layout')

@section('header')
    @yield('header')
@endsection

@section('content')
    <div class="py-5 mt-5">
        <div class='overflow-x-auto w-full'>
            <div
                class="mx-auto max-w-xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden">
                @yield('form')
            </div>

        </div>
    </div>
@endsection
