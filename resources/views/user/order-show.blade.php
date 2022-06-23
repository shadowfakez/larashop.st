@extends('layouts.layout')

@section('header')
    <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection

@section('content')

<div class="flex justify-center items-center px-6 py-2 max-w-screen-2xl mx-auto">
    <div class="max-w-screen-xl rounded p-4">
        <a href="">
            <div class="rounded overflow-hidden p-4 m-4 group block mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400">
                <div class="grid place-items-center">
                    <h1 class="text-center text-3xl font-bold mb-4">Order # {{ $order->id }}</h1>
                </div>
                <div class="px-6 py-4">
                    <div class="text-left text-xl mb-4"><b>Customer name: </b>{{ $order->name }}</div>
                    <div class="text-left text-xl mb-4"><b>Customer phone: </b>{{ $order->phone }}</div>
                    <div class="text-left text-xl mb-4"><b>Order created: </b>{{ $order->created_at }}</div>
                    <div class="text-left text-xl mb-4"><b>Order updated: </b>{{ $order->updated_at }}</div>
                    <div class="text-left text-xl mb-4"><b>Order status: {{ $order->status }}</b></div>
                </div>
                <div class="text-center text-2xl mb-4"><b>Product list: </b></div>
                <table
                    class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                    <thead class="bg-gray-900">
                    <tr class="text-white text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4"> #</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Image</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Category</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Name</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Price</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Quantity</th>
                        <th class="font-semibold text-sm uppercase px-6 py-4"> Value</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($order->products as $product)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href=""
                                   class="hover:text-rose-600">{{ $product->id }}</a>
                            </td>
                            <td class="px-6 py-4 grid place-items-center">
                                <img class="w-full @if($product->category_id == 1) w-12 h-24 @else h-12 w-24 @endif"
                                     src="{{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{ route('admin.categories.show', $product->category->id) }}"
                                   class="hover:text-rose-600">{{ $product->category->name }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{ route('admin.products.show', $product->id) }}"
                                   class="hover:text-rose-600">{{ $product->name }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href=""
                                   class="hover:text-rose-600">{{ $product->price }} ₴</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-center">
                                <a href="" class="hover:text-rose-600">{{ $product->pivot->count }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href=""
                                   class="hover:text-rose-600">{{ $product->getValue() }} ₴</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="text-right text-xl mb-4"><b>Total price: </b>{{ $order->getTotalValue() }} ₴</div>

            </div>
        </a>
    </div>
</div>
@endsection
