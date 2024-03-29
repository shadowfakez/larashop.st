@extends('admin.layout')

@section('header', 'Create property option')

@section('admin-content')
    <div class="py-5">
        <div class='overflow-x-auto w-full'>
            <form action="{{ route('admin.property-options.store', $property) }}" method="POST"
                  class="px-8 pt-6 pb-2 mb-4 bg-white rounded" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name of
                        property option</label>
                    <input type="text" name="name" id="name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required>
                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>

@endsection
