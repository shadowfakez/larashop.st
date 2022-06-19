@extends('admin.layout')

@section('header', 'Edit ' . $category->name . ' category')

@section('admin-content')
    <div class="py-5">
        <div class='overflow-x-auto w-full'>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="px-8 pt-6 pb-2 mb-4 bg-white rounded" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name of category</label>
                    <input type="text" name="name" id="name" value="{{ $category->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="alias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alias</label>
                    <input type="text" name="alias" id="alias" value="{{ $category->alias }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <textarea type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $category->description }}</textarea>
                </div>
                <div class="mb-6">
                    <img class="w-full w-96 h-48"
                         src="{{ isset($category->image) ? asset('storage/images/categories/' . $category->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Choose image for category</label>
                    <input type="file" class="block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer focus:outline-none" name="image" id="image" accept=".jpg,.jpeg,.bmp,.png,.gif">
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </div>

@endsection
