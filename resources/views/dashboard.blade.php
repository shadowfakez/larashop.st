@extends('layouts.layout')

@section('header')
    <a href="{{ route('dashboard') }}">Dashboard</a>
@endsection

@section('content')
<div class="p-5">
    <h1 class="py-5 bg-sky-200 text-center text-3xl">My orders</h1>

    <div class="py-5">
        <div class='overflow-x-auto w-full'>
            <table
                class='mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                <thead class="bg-gray-900">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4"> # </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Status </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Name</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Phone</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Date</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Value</th>
                    <th class="font-semibold text-sm uppercase px-6 py-4"> Open</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)

                    <tr class="border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $order->id }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $order->status }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href=""
                               class="hover:text-rose-600">{{ $order->name }}</a>
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $order->phone }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ Carbon\Carbon::parse($order->created_at)->format('H:i d.m.Y') }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $order->getSumInCurrentCurrency() }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('order.show', $order->id) }}"
                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Open</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="items-center p-2 md:justify-between max-w-screen-2xl mx-auto">
            {{ $orders->links() }}
        </div>
    </div>
</div>

@endsection
