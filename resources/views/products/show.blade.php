@extends('layouts.layout')

@section('header')
    {{ $product->name }}
@endsection

@section('content')
    <div class="flex justify-center items-center px-6 py-2 max-w-screen-2xl mx-auto">
        <div class="max-w-screen-xl rounded p-4">
            <div class="grid place-items-center">
                <img class="w-full @if($product->category_id == 1) w-48 h-96 @else h-48 w-96 @endif"
                     src="{{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
            </div>
            <div class="px-6 py-4">
                <p class="text-gray-700 text-justify text-base">
                    {{ $product->description }}
                </p>
            </div>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Price: <span
                        class="text-green-800">{{ $product->price }} ₴</span></div>
            </div>
            <div class="flex justify-center px-6 py-4">
                <div class="text-lg">
                    <form action="{{ route('add.to.cart', $product) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-transparent bg-gray-200 text-blue-800 font-semibold py-2 px-4 border rounded border-gray-700 hover:border-indigo-200 hover:bg-indigo-100">
                            Add to cart
                        </button>
                    </form>

                </div>
            </div>
            <div class="px-6 pt-4">
                <a href="{{ route('category.show', $product->category->alias) }}"
                   class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 border border-gray-700 hover:border-indigo-200 hover:bg-gray-200">#{{ $product->category->name }}</a>
            </div>
        </div>
    </div>
@endsection
