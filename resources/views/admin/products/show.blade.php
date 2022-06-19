@extends('admin.layout')

@section('header', $product->name)

@section('admin-content')
    <div class="flex justify-center items-center px-6 py-2 max-w-screen-2xl mx-auto">
        <div class="max-w-screen-xl rounded p-4">
            <a href="">
                <div
                    class="rounded overflow-hidden p-4 m-4 group block mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400">
                    <div class="grid place-items-center">
                        <img class="w-full @if($product->category_id == 1) w-48 h-96 @else h-48 w-96 @endif"
                             src="{{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
                    </div>
                    <div class="px-6 py-4">
                        <div class="text-left text-xl mb-4"><b>Name: </b>{{ $product->name }}</div>
                        <div class="text-left text-xl mb-4"><b>Alias: </b>{{ $product->alias }}</div>
                        <div class="text-left text-xl mb-4"><b>Description: </b>{{ $product->description }}</div>
                        <div class="text-left text-xl mb-4"><b>Short description: </b>{{ $product->short_desc }}</div>
                        <div class="text-left text-xl mb-4"><b>Category: </b>{{ $product->category->name }}</div>
                        <div class="text-left text-xl mb-4"><b>Price: </b>{{ $product->price }} ₴</div>
                    </div>
                    <div class="px-6 py-4 flex justify-end">
                        <a type="button" href="{{ route('admin.products.edit', $product->id) }}"
                                class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Edit
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class=" d-grid gap-2">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('You want to delete {{ $product->name }} product! Please, confirm your action!')"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            </a>
        </div>
    </div>
@endsection
