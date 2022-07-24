@extends('layouts.layout')

@section('header')
    {{ $product->name }}
@endsection

@section('content')
    <div class="flex justify-center items-center px-6 py-2 max-w-screen-2xl mx-auto">
        <div class="max-w-screen-xl rounded p-4 bg-white ">
            <div class="bg-no-repeat bg-contain bg-center w-full h-48"
                 style="background-image: url({{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }})">
                @if ($product->isNew())
                    <div class="">
                        <a href="{{--{{ route('category.show', $product->category->alias) }}--}}"
                           class="bg-green-700 rounded-full px-3 py-1 text-xs text-white mr-2 mb-2 border border-indigo-100 hover:border-indigo-200 hover:bg-gray-200 hover:text-gray-700">New
                            product!</a>
                    </div>
                @endif
                @if ($product->isHit())
                    <div class="">
                        <a href="{{--{{ route('category.show', $product->category->alias) }}--}}"
                           class="bg-yellow-500 rounded-full px-3 py-1 text-xs text-white mr-2 mb-2 border border-indigo-100 hover:border-indigo-200 hover:bg-gray-200 hover:text-gray-700">Hit!</a>
                    </div>
                @endif
                @if ($product->isRecommend())
                    <div class="">
                        <a href="{{--{{ route('category.show', $product->category->alias) }}--}}"
                           class="bg-red-600 rounded-full px-3 py-1 text-xs text-white mr-2 mb-2 border border-indigo-100 hover:border-indigo-200 hover:bg-gray-200 hover:text-gray-700">Recommended!</a>
                    </div>
                @endif
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
                        @if($product->isAvailable())
                            <button type="submit"
                                    class="bg-transparent bg-white text-blue-800 font-semibold py-2 px-4 border rounded border-blue-800 hover:border-blue-200 hover:bg-blue-100">
                                Add to cart
                            </button>
                        @else
                            <span type="submit"
                                  class="bg-transparent bg-white text-red-800 font-semibold py-2 px-4 border rounded border-red-700 hover:border-red-200 hover:bg-red-100">
                                    Not available
                                </span>
                        @endif
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
