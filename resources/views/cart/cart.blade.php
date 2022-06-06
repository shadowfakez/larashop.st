@extends('layouts.layout')

@section('header')
    Cart
@endsection

@section('content')
    @if(is_null($order))
        <div class="py-2 inline-block items-center min-w-full sm:px-6 lg:px-8">
            <h1 class="text-center text-3xl font-bold py-6">Your cart is empty</h1>
        </div>
    @else
        <div class="py-5">
            <div class='overflow-x-auto w-full'>
                <table
                    class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-900">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Product name</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Category</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Quantity</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Price</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Value</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Edit</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
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
                                <span class="mr-3">{{ $product->pivot->count }}</span>
                                <form action="{{ route('add.to.cart', $product) }}" class="inline-block"
                                      method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="inline-flex items-center justify-center w-7 h-7  bg-green-500 text-white rounded-full hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg border border-indigo-200">
                                        +
                                    </button>
                                </form>
                                <form action="{{ route('remove.from.cart', $product) }}"
                                      class="inline-block"
                                      method="POST">
                                    @csrf
                                    <button
                                        class="inline-flex items-center justify-center w-7 h-7 bg-red-600 text-white rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg border border-indigo-200">
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

            <div class='overflow-x-auto w-full'>
                <div class='flex justify-end items-center p-4 mx-auto max-w-4xl w-full bg-white'>
                    <h1 class="items-center text-2xl font-bold inline-block mr-16">Total
                        value: {{ $order->getTotalValue() }} ₴</h1>
                    <a href="{{ route('cart.order') }}"
                       class="bg-transparent bg-gray-200 text-blue-800 font-semibold py-2 px-4 border rounded border-gray-700 hover:border-indigo-200 hover:bg-indigo-100">Confirm</a>
                </div>
            </div>
        </div>

    @endif

@endsection

