@extends('layouts.layout')

@section('header')
    {{ $category_name }}
@endsection

@section('content')
    <div class="flex flex-col xl:flex-row md:justify-between px-6 py-2 max-w-screen-2xl mx-auto">
        @foreach($products as $product)

            <div class="max-w-md rounded overflow-hidden p-4 m-4 group block max-w-xs mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400">
                <div class="grid place-items-center">
                    <img class="w-full"
                         src="{{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
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
            </div>
        @endforeach
    </div>
    <div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
        {{ $products->links() }}
    </div>
@endsection
