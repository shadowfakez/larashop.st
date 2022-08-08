@extends('layouts.layout')

@section('header')
    Products
@endsection

@section('content')
    <div class="shadow-sm bg-indigo-200">
        <form class="inline-block" action="{{ route('products.index') }}" method="GET">
            <div class="flex flex-row justify-center px-12 w-screen">
                <span class="p-2">Price from</span>
                <div class="p-2">
                    <input class="w-24 h-6 focus:outline-none" name="price_from" type="text"
                           value="{{ request()->price_from }}">
                </div>
                <span class="p-2">to</span>
                <div class="p-2 mr-16">
                    <input class="w-24 h-6" name="price_to" id="grid-last-name" type="text"
                           value="{{ request()->price_to }}">
                </div>
                <div class="m-2">
                    @foreach ([
                    'new' => 'New product',
                    'hit' => 'Hit product',
                    'recommend' => 'Recommended',
                       ] as $field => $title)
                        <label for="{{ $field }}"
                               class="p-2 text-sm font-medium text-gray-900">{{ $title }}</label>
                        <input type="checkbox" name="{{ $field }}" id="{{ $field }}"
                               @if (request()->has($field)) checked
                               @endif class="p-2 mr-16 text-green-600 bg-gray-100 border rounded focus:ring-green-500">
                    @endforeach
                </div>
                <div class="m-2">
                    <button type="submit"
                            class="text-sm bg-transparent bg-indigo-800 text-gray-300 w-24 h-6 mx-2 border rounded border-gray-700 hover:text-indigo-800 hover:border-indigo-800 hover:bg-indigo-100">
                        Filter
                    </button>
                    <a href="{{ route('products.index') }} "
                       class="text-sm text-center bg-transparent bg-red-800 text-gray-300 w-24 h-6 mx-2 border rounded border-gray-700 hover:text-red-800 hover:border-red-800 hover:bg-red-100"
                       type="button">
                        Reset
                    </a>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="flex flex-col xl:flex-row md:justify-between px-6 py-2 max-w-screen-2xl mx-auto">
        @foreach($products as $product)
            <div
                class="max-w-md rounded overflow-hidden p-4 m-4 group block max-w-xs mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400">
                <div class="bg-no-repeat bg-contain bg-center w-full h-48"
                     style="background-image: url({{asset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}">
                    @if ($product->isNew())
                        <div class="">
                            <a href="{{--{{ route('category.show', $product->category->alias) }}--}}"
                               class="bg-green-700 rounded-full px-3 py-1 text-xs text-white mr-2 mb-2 hover:border-indigo-200 hover:bg-gray-200 hover:text-gray-700">New
                                product!</a>
                        </div>
                    @endif
                    @if ($product->isHit())
                        <div class="">
                            <a href="{{--{{ route('category.show', $product->category->alias) }}--}}"
                               class="bg-yellow-500 rounded-full px-3 py-1 text-xs text-white mr-2 mb-2 border-indigo-100 hover:border-indigo-200 hover:bg-gray-200 hover:text-gray-700">Hit!</a>
                        </div>
                    @endif
                    @if ($product->isRecommend())
                        <div class="">
                            <a href="{{--{{ route('category.show', $product->category->alias) }}--}}"
                               class="bg-red-600 rounded-full px-3 py-1 text-xs text-white mr-2 mb-2 hover:border-red-600 hover:bg-gray-200 hover:text-gray-700">Recommended!</a>
                        </div>
                    @endif
                </div>
                <div
                    class="max-w-sm rounded overflow-hidden p-4 m-4 group block mx-auto rounded-lg bg-gray-50 ring-1 ring-slate-900/5 space-y-3 border border-indigo-100 hover:border-indigo-200 hover:bg-indigo-100">
                    <a href="{{ route('products.show', ['product' => $product->alias]) }}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-center text-xl mb-2">{{ $product->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $product->short_desc }}
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Price: <span
                                    class="text-green-800">{{ $product->price }} {{ $currencySymbol }}</span></div>
                        </div>
                    </a>
                </div>
                <div class="px-6 pt-4">
                    <a href="{{ route('category.show', $product->category->alias) }}"
                       class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 border border-indigo-100 hover:border-indigo-200 hover:bg-gray-200">#{{ $product->category->name }}</a>
                </div>
                <div class="flex justify-center px-6 py-4">
                    <div class="text-lg">
                        @if($product->isAvailable())
                            <form action="{{ route('add.to.cart', $product) }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="bg-transparent bg-white text-blue-800 font-semibold py-2 px-4 border rounded border-blue-800 hover:border-blue-200 hover:bg-blue-100">
                                    Add to cart
                                </button>
                            </form>
                        @else
                            <span type="submit"
                                  class="bg-transparent bg-white text-red-800 font-semibold py-2 px-4 border rounded border-red-700 hover:border-red-200 hover:bg-red-100">
                                    Not available
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
        {{ $products->links() }}
    </div>
@endsection
