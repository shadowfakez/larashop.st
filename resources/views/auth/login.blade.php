@extends('auth.layout')

@section('form')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <p class="mb-4 text-center font-bold text-lg">Please login to your account</p>
        <div class="mb-4">
            <input
                type="email"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out m-0 border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                id="exampleFormControlInput1"
                name="email"
                placeholder="Email"
            />
        </div>
        <div class="mb-4">
            <input
                type="password"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding transition ease-in-out m-0 border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                id="exampleFormControlInput1"
                name="password"
                placeholder="Password"
            />
        </div>
        <div class="text-center pt-1 mb-12 pb-1">
            <button
                class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-gradient-to-r from-rose-600 to-fuchsia-200 focus:border-rose-600 active:border-rose-600 focus:outline-none focus:ring-rose-500 focus:ring-1"
                type="submit"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light">
                Log in
            </button>
            <a class="text-gray-500" href="#">Forgot password?</a>
        </div>
        <div class="flex items-center justify-between pb-6">
            <p class="mb-0 mr-2">Don't have an account?</p>
            <button
                type="button"
                class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
            >
                Danger
            </button>
        </div>
    </form>
@endsection
