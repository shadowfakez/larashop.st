@extends('layouts.layout')

@section('content')
    <div class="items-center md:justify-between px-16 py-14 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
        <h1 class="text-center text-3xl font-bold">Categories</h1>
    </div>
    <div class="flex flex-col md:flex-row items-center md:justify-between px-6 py-4 border-b border-b-gray-60 shadow-sm max-w-screen-2xl mx-auto">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="grid place-items-center">
                <img class="w-full h-48 w-96 grid place-items-center"
                     src="https://miro.medium.com/max/1400/1*goGPwn50r5CuNC_dlXnU9A.jpeg" alt="Sunset in the mountains">
            </div>

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Cell Phones</div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                    perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="grid place-items-center">
                <img class="w-full h-48 w-96 grid place-items-center"
                     src="https://www.pcworld.com/wp-content/uploads/2022/05/bf-laptop-deals-pcw-11.jpg?quality=50&strip=all&w=1024" alt="Sunset in the mountains">
            </div>

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">Laptops</div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                    perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="grid place-items-center">
                <img class="w-full h-48 w-96 grid place-items-center"
                     src="https://www.ixbt.com/img/n1/news/2021/4/3/Xiaomi-Mi-TV-P1-Series-Featured_0_large.png" alt="Sunset in the mountains">
            </div>

            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">TV</div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
                    perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
        </div>
    </div>
@endsection
