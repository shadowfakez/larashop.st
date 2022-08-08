@extends('admin.layout')

@section('header')
    Property Options
@endsection

@section('admin-content')
    <div class="py-5 mb-6">
        <div class='overflow-x-auto w-full'>
            <a href="{{ route('admin.property-options.create', $property) }}" type="button"
               class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-6">Add
                New Property Option</a>
            <table
                class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> #</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Property</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Open</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Edit</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($propertyOptions as $propertyOption)

                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $propertyOption->id }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $property->name }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $propertyOption->name }}</a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a type="button" href="{{ route('admin.property-options.show', [$property, $propertyOption->id]) }}"
                               class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Open
                            </a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a type="button" href="{{ route('admin.property-options.edit', [$property, $propertyOption->id]) }}"
                               class="text-indigo-600 hover:text-white border border-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Edit
                            </a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.property-options.destroy', [$property, $propertyOption->id]) }}" method="POST"
                                  class=" d-grid gap-2">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('You want to delete {{ $propertyOption->name }} property option! Please, confirm your action!')"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
            {{ $propertyOptions->links() }}
        </div>
    </div>

@endsection
