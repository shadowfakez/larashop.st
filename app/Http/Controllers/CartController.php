<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {

        $orderId = session('orderId');
        $order = Order::find($orderId);

        //dd($order->products()->where('order_id', $orderId)->first());

        if (is_null($orderId)) {
            return view('cart.cart', compact('order'));
        } else {
            if (is_null($order->products()->where('order_id', $orderId)->first())) {
                $order->delete();
                Session::forget('orderId');
                $order = Order::find($orderId);
            }
            return view('cart.cart', compact('order'));
        }
    }

    public function addToCart($productId)
    {
        //Session::forget('orderId');
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

        return redirect()->route('cart')->with('success', /*$order->products->find($productId)->name .*/ ' has been added to the cart');
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

        return redirect()->route('cart')->with('success', $order->products->find($productId)->name . ' has been removed from the cart');
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

        if (Auth::check()) {
            $name = Auth::user()->name;
            $order->user_id = Auth::id();
        } else {
            $name = $request->name;
        }

        $success = $order->saveOrder($name, $request->phone);


        return redirect()->route('home')->with('success', 'Your order has been confirmed!');
    }
}
