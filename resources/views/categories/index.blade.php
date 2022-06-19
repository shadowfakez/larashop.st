@extends('layouts.layout')

@section('header')
    Categories
@endsection

@section('content')
    <div class="flex flex-col xl:flex-row md:justify-between px-6 py-2 max-w-screen-2xl mx-auto">
        @foreach($categories as $category)
            <a href="{{ route('category.show', ['alias' => $category->alias]) }}">
                <div class="max-w-md rounded overflow-hidden p-4 m-4 group block max-w-xs mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400">
                    <div class="grid place-items-center">
                        <img class="w-full w-96 h-48"
                             src="{{ isset($category->image) ? asset('storage/images/categories/' . $category->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-center text-xl mb-2">{{ $category->name }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $category->description }}
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
        {{ $categories->links() }}
    </div>
@endsection
