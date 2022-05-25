@extends('layouts.layout')

@section('content')
    <div
        class="lg:items-center md:justify-between px-16 py-6 border-b border-b-gray-60 shadow-lg max-w-screen-2xl mx-auto">
        <h1 class="text-center text-3xl font-bold">Cart</h1>
    </div>

    @if($order == null)
        <h1 class="text-center text-3xl font-bold py-6">Your cart is empty</h1>
    @else
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <div class="items-center md:justify-between px-6 py-4 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
                            <table class="min-w-full">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Product name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Category
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Quantity
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Price
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Value
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->products as $product)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <a href="{{ route('products.show', $product->alias) }}"
                                               class="hover:text-rose-600">{{ $product->name }}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $product->category->name }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-block mx-4 px-4 py-2 border border-gray-500 text-gray-800 font-medium text-xs leading-tight uppercase rounded">{{ $product->pivot->count }}</span>
                                            <form action="{{ route('add.to.cart', $product) }}" class="inline-block"
                                                  method="POST">
                                                @csrf
                                                <button type="submit"
                                                        class="inline-block rounded-full px-4 py-2.5 bg-green-500 text-white font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out text-lg">
                                                    +
                                                </button>
                                            </form>
                                            <form action="{{ route('remove.from.cart', $product) }}"
                                                  class="inline-block"
                                                  method="POST">
                                                @csrf
                                                <button
                                                    class="inline-block rounded-full px-4 py-2.5 bg-red-600 text-white font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out text-lg">
                                                    –
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $product->price }} ₴
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $product->getValue() }} ₴
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a href="#"
                                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end items-center px-8 py-4 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
            <h1 class="items-center text-3xl font-bold inline-block mr-16">Total value: {{ $order->getTotalValue() }} ₴</h1>
            <a href="{{ route('cart.order') }}" class="items-center bg-transparent hover:bg-fuchsia-200 text-rose-400 font-semibold hover:text-rose-600 border border-fuchsia-200 hover:border-rose-600 rounded inline-block py-2 px-4 text-xl">Confirm</a>
        </div>
    @endif

@endsection

