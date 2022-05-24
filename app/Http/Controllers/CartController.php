<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            session(['orderId' => $order->id]);
        }
        $order = Order::find($orderId);
        return view('cart.cart', compact('order'));
    }

    public function cartPlace()
    {
        return view('cart.order');
    }

    public function addToCart($productId)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)) {
            $addToCount = $order->products()->where('product_id', $productId)->first()->pivot;
            $addToCount->count++;
            $addToCount->update();
        } else {
            $order->products()->attach($productId);
        }

        return redirect()->route('cart');
    }

    public function removeFromCart($productId)
    {

        $orderId = session('orderId');
        $order = Order::find($orderId);

        if (is_null($orderId)) {
            return redirect()->route('cart');
        }

        if ($order->products->contains($productId)) {
            $addToCount = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($addToCount->count < 2) {
                $order->products()->detach($productId);
            } else {
                $addToCount->count--;
                $addToCount->update();
            }
        }

        return redirect()->route('cart');
    }
}
