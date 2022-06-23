@extends('layouts.layout')

@section('header')
    Products
@endsection

@section('content')
    <div class="flex flex-col xl:flex-row md:justify-between px-6 py-2 max-w-screen-2xl mx-auto">
        @foreach($products as $product)
            <div class="max-w-md rounded overflow-hidden p-4 m-4 group block max-w-xs mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400">
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
                <div
                    class="max-w-sm rounded overflow-hidden p-4 m-4 group block mx-auto rounded-lg bg-gray-200 ring-1 ring-slate-900/5 space-y-3 border border-indigo-100 hover:border-indigo-200 hover:bg-indigo-100">
                    <a href="{{ route('products.show', ['product' => $product->alias]) }}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-center text-xl mb-2">{{ $product->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $product->short_desc }}
                            </p>
                        </div>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">Price: <span
                                    class="text-green-800">{{ $product->price }} ₴</span></div>
                        </div>
                    </a>
                </div>
                <div class="px-6 pt-4">
                    <a href="{{ route('category.show', $product->category->alias) }}"
                       class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 border border-indigo-100 hover:border-indigo-200 hover:bg-gray-200">#{{ $product->category->name }}</a>
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
            </div>
        @endforeach
    </div>
    <div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
        {{ $products->links() }}
    </div>
@endsection
