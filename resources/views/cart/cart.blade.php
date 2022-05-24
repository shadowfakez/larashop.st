@extends('layouts.layout')

@section('content')
    <div
        class="items-center md:justify-between px-16 py-6 border-b border-b-gray-60 shadow-lg max-w-screen-2xl mx-auto">
        <h1 class="text-center text-3xl font-bold">Cart</h1>
    </div>

    @if($order == null)
        <h1 class="text-center text-3xl font-bold">Cart is empty</h1>
    @else
        <div
            class="bg-gradient-to-r from-rose-600 to-fuchsia-200 dark:bg-black dark:text-white flex flex-col md:flex-row items-center md:justify-between px-6 py-4 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <a href="{{ route('products.show', $product->alias) }}"
                               class="hover:text-rose-600">{{ $product->name }}</a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->category->name }}
                        </td>
                        <td class="px-6 py-4">
                        <span
                            class="inline-block mx-4 px-4 py-2 border border-gray-500 text-gray-800 font-medium text-xs leading-tight uppercase rounded">{{ $product->pivot->count }}</span>
                            <form action="{{ route('add-to-cart', $product) }}" class="inline-block" method="POST">
                                @csrf
                                <button type="submit"
                                        class="inline-block rounded-full px-4 py-2.5 bg-green-500 text-white font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out text-lg">
                                    +
                                </button>
                            </form>
                            <form action="{{ route('remove-from-cart', $product) }}" class="inline-block" method="POST">
                                @csrf
                                <button
                                    class="inline-block rounded-full px-4 py-2.5 bg-red-600 text-white font-medium text-md leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out text-lg">
                                    –
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->price }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection

