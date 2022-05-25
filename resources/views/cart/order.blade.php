@extends('layouts.layout')

@section('content')
    <div class="lg:items-center md:justify-between px-16 py-6 border-b border-b-gray-60 shadow-lg max-w-screen-2xl mx-auto">
        <h1 class="text-center text-3xl font-bold">Please, Confirm Your Order</h1>
    </div>
    <div class="pt-4">
        <div class="flex justify-center items-center px-6 py-6 max-w-screen-2xl mx-auto">
            <h3 class="text-center text-xl font-bold sm:text-center">Total value of Your Order: {{ $order->getTotalValue() }} ₴</h3>
        </div>
        <div class="flex justify-center items-center px-6 py-4 max-w-screen-2xl mx-auto">
            <h3 class="text-center text-lg">Provide your name and phone number so that our manager can contact you</h3>
        </div>
        <div class="flex justify-center items-center px-6 py-4 max-w-screen-2xl mx-auto">
            <form class="w-full max-w-sm" method="POST" action="{{ route('cart.confirm', $order) }}">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/5 pb-2">
                        <label class="block text-gray-500 font-bold md:text-center mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Full Name
                        </label>
                    </div>
                    <div class="md:w-3/5 pb-2">
                        <input class="items-center bg-transparent hover:bg-fuchsia-200 text-rose-400 font-semibold hover:text-rose-600 border-2 border-fuchsia-200 hover:border-rose-600 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-rose-600"
                            id="name" name="name" type="text">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/5 pb-2">
                        <label class="block text-gray-500 font-bold md:text-center mb-1 md:mb-0 pr-4" for="inline-password">
                            Phone Number
                        </label>
                    </div>
                    <div class="md:w-3/5 pb-2">
                        <input class="items-center bg-transparent hover:bg-fuchsia-200 text-rose-400 font-semibold hover:text-rose-600 border-2 border-fuchsia-200 hover:border-rose-600 rounded w-full py-2 px-4 focus:outline-none focus:bg-white focus:border-rose-600"
                            id="phone" name="phone" type="text">
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-2/5 pb-2"></div>
                    <div class="md:w-3/5 pb-2">
                        <button class="items-center bg-transparent hover:bg-fuchsia-200 text-rose-400 font-semibold hover:text-rose-600 border-2 border-fuchsia-200 hover:border-rose-600 rounded w-full py-2 px-4"
                            type="submit">
                            Confirm the order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
