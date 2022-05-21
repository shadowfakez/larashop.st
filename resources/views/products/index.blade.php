@extends('layouts.layout')

@section('content')
<div class="items-center md:justify-between px-16 py-6 border-b border-b-gray-60 shadow-lg max-w-screen-2xl mx-auto">
    <h1 class="text-center text-3xl font-bold">Products</h1>
</div>
<div class="flex flex-col md:flex-row items-center md:justify-between px-6 py-2 max-w-screen-2xl mx-auto">
    @foreach($products as $product)

    <div class="max-w-sm rounded overflow-hidden p-4 m-4 group block max-w-xs mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 space-y-3 hover:bg-fuchsia-200 hover:ring-rose-600">
        <a href="{{ route('products.show', ['product' => $product->alias]) }}">
            <div class="grid place-items-center">
                <img class="w-full @if($product->category_id == 1) w-48 h-96 @else h-48 w-96 @endif"
                     src="{{ asset($product->image) }}" alt="no image">
            </div>
            <div class="px-6 py-4">
                <div class="font-bold text-center text-xl mb-2">{{ $product->name }}</div>
                <p class="text-gray-700 text-base">
                    {{ $product->short_desc }}
                </p>
            </div>
            <div class="px-6 py-4 p-2">
                <div class="font-bold text-xl mb-2">Price: <span class="text-green-800">{{ $product->price }} ₴</span></div>
            </div>
        </a>
        <div class="px-6 pt-4 pb-2">
            <a href="{{ route('categories.show', $product->category->alias) }}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $product->category->name }}</a>
        </div>
    </div>

    @endforeach
</div>
<div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
    {{ $products->links() }}
</div>
@endsection
