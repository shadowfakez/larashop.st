@extends('admin.layout')

@section('header')
    Products
@endsection

@section('admin-content')
    <div class="py-5 mb-6">
        <div class='overflow-x-auto w-full mb-6'>
            <a href="{{ route('admin.products.create') }}" type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-6">Add New Product</a>
            <table class='mx-auto w-full rounded-lg bg-white divide-y divide-gray-900 overflow-hidden'>
                <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> #</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Image</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Category</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Skus</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Open</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Edit</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Delete</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($products as $product)
                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $product->id }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="w-24 h-24">
                                <img class="w-full"
                                     src="{{ isset($product->image) ? asset('storage/images/' . $product->category->alias . '/'. $product->image) : asset('storage/images/default/no-image.png') }}" alt="no image">
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $product->name }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href="{{ route('admin.categories.show', $product->category->id) }}"
                               class="hover:text-rose-600">{{ $product->category->name }}</a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a type="button" href="{{ route('admin.skus.index', $product) }}"
                                    class="text-fuchsia-700 hover:text-white border border-fuchsia-700 hover:bg-fuchsia-800 focus:ring-4 focus:outline-none focus:ring-fuchsia-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Skus
                            </a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a type="button" href="{{ route('admin.products.show', $product) }}"
                                    class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Open
                            </a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a type="button" href="{{ route('admin.products.edit', $product) }}"
                                    class="text-indigo-600 hover:text-white border border-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Edit
                            </a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class=" d-grid gap-2">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('You want to delete {{ $product->name }} product! Please, confirm your action!')"
                                        class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>



@endsection
