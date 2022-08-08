@extends('layouts.layout')

@section('header')
    Please, Confirm Your Order
@endsection

@section('content')
    <div class="pt-4">
        <div class="flex justify-center items-center px-6 py-6 max-w-screen-2xl mx-auto">
            <h3 class="text-center text-xl font-bold sm:text-center">Total value of Your Order: {{ $order->getTotalValue() }} {{ $currencySymbol }}</h3>
        </div>
        <div class="flex justify-center items-center px-6 py-4 max-w-screen-2xl mx-auto">
            @auth
            <h3 class="text-center text-lg">Provide your phone number so that our manager can contact you</h3>
            @endauth
            @guest
            <h3 class="text-center text-lg">Provide your name and phone number so that our manager can contact you</h3>
            @endauth
        </div>
        <div class="flex justify-center items-center px-6 py-4 max-w-screen-2xl mx-auto">
            <form class="w-full max-w-sm" method="POST" action="{{ route('cart.confirm', $order) }}">
                @csrf

                @guest
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/5 pb-2">
                        <label class="block text-gray-500 font-bold md:text-center mb-1 md:mb-0 pr-4" for="name">
                            Full Name
                        </label>
                    </div>

                    <div class="md:w-3/5 pb-2">
                        <input class="items-center bg-transparent font-semibold w-full py-2 px-4 bg-gray-200 text-blue-800 border rounded border-gray-500 hover:border-indigo-200 hover:bg-indigo-100"
                            id="name" name="name" type="text">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/5 pb-2">
                        <label class="block text-gray-500 font-bold md:text-center mb-1 md:mb-0 pr-4" for="email">
                            Email
                        </label>
                    </div>

                    <div class="md:w-3/5 pb-2">
                        <input class="items-center bg-transparent font-semibold w-full py-2 px-4 bg-gray-200 text-blue-800 border rounded border-gray-500 hover:border-indigo-200 hover:bg-indigo-100"
                               id="email" name="email" type="email">
                    </div>
                </div>
                @endauth

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/5 pb-2">
                        <label class="block text-gray-500 font-bold md:text-center mb-1 md:mb-0 pr-4" for="inline-password">
                            Phone Number
                        </label>
                    </div>
                    <div class="md:w-3/5 pb-2">
                        <input class="items-center bg-transparent font-semibold w-full py-2 px-4 bg-gray-200 text-blue-800 border rounded border-gray-500 hover:border-indigo-200 hover:bg-indigo-100"
                            id="phone" name="phone" type="text">
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-2/5 pb-2"></div>
                    <div class="md:w-3/5 pb-2">
                        <button class="bg-transparent bg-gray-200 text-blue-800 font-semibold py-2 px-4 border rounded border-gray-700 hover:border-indigo-200 hover:bg-indigo-100"
                            type="submit">
                            Confirm the order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
