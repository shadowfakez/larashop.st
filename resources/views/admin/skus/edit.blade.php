@extends('admin.layout')

@section('header', 'Edit ' . $sku->name . ' sku')

@section('admin-content')
    <div class="py-5">
        <div class='overflow-x-auto w-full'>
            <form action="{{ route('admin.skus.update', [$product, $sku->id]) }}" method="POST" class="px-8 pt-6 pb-2 mb-4 bg-white rounded" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <form action="{{ route('admin.skus.store', $product) }}" method="POST"
                      class="px-8 pt-6 pb-2 mb-4 bg-white rounded" enctype="multipart/form-data">
                    @csrf
                    <h2 class="mb-4 font-semibold text-center text-gray-900">Properties</h2>
                    <div class="mb-6">
                        <label for="price"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                        <input type="text" name="price" {{--value="{{ old('price') }}"--}} value="{{ $sku->price }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="count"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Available quantity</label>
                        <input type="text" name="count" {{--value="{{ old('count') }}"--}} value="{{ $sku->count }}"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @foreach($product->properties as $property)
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="property_id[{{ $property->id }}]">
                                {{ $property->name }}
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"  name="property_id[{{ $property->id }}]">

                                    @foreach($property->propertyOptions as $propertyOption)

                                        <option value="{{ $propertyOption->id }}"
                                            @if($sku->propertyOptions->contains($propertyOption->id )) selected @endif>{{ $propertyOption->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>
            </form>
        </div>
    </div>

@endsection
