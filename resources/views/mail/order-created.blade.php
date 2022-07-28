<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <p>Hi, <b>{{ $order->name }}</b>!</p>
    <p>Your order was successfully confirmed!</p>
    <p>List of products:</p>
    <table
        class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
        <thead class="bg-gray-900">
        <tr class="text-white text-left">
            <th class="font-semibold text-sm uppercase px-6 py-4"> Product name</th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Category</th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Quantity</th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Price</th>
            <th class="font-semibold text-sm uppercase px-6 py-4"> Value</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($order->products as $product)
            <tr class="border-b">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <a href="{{ route('products.show', $product->alias) }}"
                       class="hover:text-rose-600">{{ $product->name }}</a>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $product->category->name }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <span class="mr-3">{{ $product->pivot->count }}</span>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $product->price }} ₴
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $product->getValue() }} ₴
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class='overflow-x-auto w-full'>
        <div class='flex justify-end items-center p-4 mx-auto max-w-4xl w-full bg-white'>
            <h1 class="items-center text-2xl font-bold inline-block mr-16">Total value: {{ $order->getTotalValue() }} ₴</h1>
        </div>
    </div>
</body>
</html>

