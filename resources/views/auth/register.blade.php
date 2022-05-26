@extends('auth.layout')

@section('form')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <p class="mb-4 text-center font-bold text-lg">Please register to your account</p>
        <div class="mb-4">
            <input
                type="text"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out m-0 border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                id="name"
                name="name"
                :value="old('name')"
                placeholder="Username"
            />
        </div>
        <div class="mb-4">
            <input
                type="email"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out m-0 border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                id="email"
                name="email"
                :value="old('email')"
                placeholder="Email"
            />
        </div>
        <div class="mb-4">
            <input
                type="password"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out m-0 border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                id="password"
                name="password"
                placeholder="Password"
            />
        </div>
        <div class="mb-4">
            <input
                type="password"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out m-0 border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Confirm Password"
            />
        </div>
        <div class="text-center pt-1 mb-12 pb-1">
            <button
                class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-gradient-to-r from-rose-600 to-fuchsia-200 focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                type="submit"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                Register
            </button>
        </div>
    </form>
@endsection
