@extends('admin.layout')

@section('header', 'Edit ' . $product->name )

@section('admin-content')
    <div class="py-5">
        <div class='overflow-x-auto w-full'>
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                  class="px-8 pt-6 pb-2 mb-4 bg-white rounded" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name of
                        category</label>
                    <input type="text" name="name" id="name"
                           value="{{ old('name') !== null ? old('name') : $product->name }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="alias"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alias</label>
                    <input type="text" name="alias" id="alias"
                           value="{{ old('alias') !== null ? old('alias') : $product->alias }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <textarea type="text" name="description" id="description"
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('description') !== null ? old('description') : $product->description }}</textarea>
                </div>
                <div class="mb-6">
                    <label for="short_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <textarea type="text" name="short_desc" id="short_desc"
                              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('short_desc') !== null ? old('short_desc') : $product->short_desc }}</textarea>
                </div>
                <div class="mb-6">
                    <img class="w-full @if($product->category_id == 1) w-12 h-24 @else h-12 w-24 @endif"
                         src="{{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}"
                         alt="no image">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Choose
                        image for product</label>
                    <input type="file"
                           class="block w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer focus:outline-none"
                           name="image" id="image" accept=".jpg,.jpeg,.bmp,.png,.gif">
                </div>
                {{--<div class="mb-6">
                    <label for="price"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                    <input type="text" name="price" id="price"
                           value="{{ old('price') !== null ? old('price') : $product->price }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>--}}
                {{--<div class="mb-6">
                    <label for="count"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Available quantity</label>
                    <input type="text" name="count" id="count"
                           value="{{ old('count') !== null ? old('count') : $product->count }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>--}}
                <div class="mb-6">
                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Properties</h3>
                    <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($properties as $property)
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                            <div class="flex items-center pl-3">
                                <input value="{{ $property->id }}" name="property_id[]" type="checkbox" @if($product->properties->contains($property->id)) checked="checked" @endif class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="property_id" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $property->name }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-6">
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter
                            text-grey-darker py-3 px-4 pr-8 rounded" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id }}"
                                        @if($category->id == $product->category_id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-6">
                    @foreach ([
                    'new' => 'New product',
                    'hit' => 'Hit product',
                    'recommend' => 'Recommended',
                       ] as $field => $title)
                        <div class="mr-4 mb-6 py-2">
                            <label for="{{ $field }}"
                                   class="{{ $field }} ml-2 mr-4 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $title }}</label>
                            <input type="checkbox" name="{{ $field }}" id="{{ $field }}"
                                   @if ($product->$field === 1) checked="checked" @endif
                                   class="w-4 h-4 text-green-600 bg-gray-100 border-gray-800 border rounded border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    @endforeach

                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
