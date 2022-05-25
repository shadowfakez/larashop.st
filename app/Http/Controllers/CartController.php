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

    public function cartOrder()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect('home');
        }
        $order = Order::find($orderId);
        return view('cart.order', compact('order'));
    }

    public function cartConfirm(Request $request)
    {
        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        return redirect()->route('home')->with('confirm', 'Your order has been confirmed!');
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

        $product = Product::findOrFail($productId);

        return redirect()->route('cart')->with('added', $product->name . ' has been added to the cart' );
    }

    public function removeFromCart($productId)
    {

        $orderId = session('orderId');

        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $addToCount = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($addToCount->count < 2) {
                $order->products()->detach($productId);
            } else {
                $addToCount->count--;
                $addToCount->update();
            }
        }

        $product = Product::findOrFail($productId);

        return redirect()->route('cart')->with('removed', $product->name . ' has been removed from the cart');
    }
}
