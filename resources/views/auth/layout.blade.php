@extends('layouts.layout')

@section('content')
    <section class="h-full gradient-form md:h-screen justify-items-center">
        <div class="container py-12 px-6 h-full mx-auto">
            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
                <div class="xl:w-10/12">
                    <div class="block bg-white border border border-fuchsia-200 hover:border-rose-600 shadow-lg rounded-lg">
                        <div class="lg:flex lg:flex-wrap g-0">
                            <div class="lg:w-6/12 px-4 md:px-0">
                                <div class="md:p-12 md:mx-6">
                                    @yield('form')
                                </div>
                            </div>
                            <div
                                class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none bg-gradient-to-r from-rose-600 to-fuchsia-200">
                                <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                                    <h4 class="text-xl text-black text-center font-semibold mb-6">Welcome to <span class="text-blue-800">Lara</span>shop</h4>
                                    <p class="text-sm text-black">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
