@extends('auth.layout')

@section('header')
    Create an Account!
@endsection

@section('form')
    <form action="{{ route('register') }}" method="POST" class="px-8 pt-6 pb-2 mb-4 bg-white rounded">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                Name
            </label>
            <input
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="name"
                type="text"
                name="name"
                placeholder="Name"
            />
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                Email
            </label>
            <input
                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="email"
                type="email"
                name="email"
                placeholder="Email"
            />
        </div>

        <div class="mb-4 md:flex md:justify-between">
            <div class="mb-4 md:mr-2 md:mb-0">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                    Password
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="password"
                    type="password"
                    name="password"
                    placeholder="******************"
                />
            </div>
            <div class="md:ml-2">
                <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                    Confirm Password
                </label>
                <input
                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    placeholder="******************"
                />
            </div>
        </div>
        <div class="mb-6 text-center">
            <button
                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Register Account
            </button>
        </div>
        <hr class="mb-4 border-t"/>
        <div class="text-center">
            <a
                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                href="./index.html"
            >
                Already have an account? Login!
            </a>
        </div>
    </form>
@endsection
