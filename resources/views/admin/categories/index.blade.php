@extends('admin.layout')

@section('header')
    Categories
@endsection

@section('admin-content')
    <div class="py-5">
        <div class='overflow-x-auto w-full'>
            <table
                class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> #</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Alias</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Open</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Edit</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($categories as $category)

                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $category->id }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $category->name }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $category->alias }}</a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <button type="button"
                                    class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Open
                            </button>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <button type="button"
                                    class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Edit
                            </button>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <button type="button"
                                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{--<div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
        {{ $category->links() }}
    </div>--}}
@endsection
