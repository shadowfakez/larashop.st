@extends('admin.layout')

@section('header', $property->name)

@section('admin-content')
    <div class="flex justify-center items-center px-6 py-2 max-w-screen-2xl mx-auto">
        <div class="max-w-screen-xl rounded p-4">
            <a href="">
                <div
                    class="flex rounded overflow-hidden p-4 m-4 group block mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 space-y-3 border-indigo-400 items-center">

                    <div class="text-left text-xl px-6"><b>Name: </b>{{ $property->name }}</div>

                    <div class="px-6 flex justify-end">
                        <a type="button" href="{{ route('admin.properties.edit', $property->id) }}"
                           class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Edit
                        </a>
                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST"
                              class=" d-grid gap-2">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('You want to delete {{ $property->name }} property! Please, confirm your action!')"
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
