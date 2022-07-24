<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Cart\Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    //TODO validation
    //TODO добавь миграцию в orders - full value
    public function cart()
    {
        $order = (new Cart())->getOrder();

        return view('cart.cart', compact('order'));
    }

    public function addToCart(Product $product)
    {
        $result = (new Cart(true))->addProduct($product);

        if ($result) {
            return redirect()->route('cart')->with('success', $product->name . ' has been added to the cart');
        } else {
            return redirect()->route('cart')->with('warning', $product->name . ' is no longer available for order(the maximum number has been exceeded)');
        }
    }

    public function removeFromCart(Product $product)
    {
        (new Cart())->removeProduct($product);

        return redirect()->route('cart')->with('success', $product->name . ' has been removed from the cart');
    }

    public function cartOrder()
    {
        $cart = new Cart;
        $order = $cart->getOrder();
        if (!$cart->countAvailable()) {
            return redirect()->route('cart')->with('warning', 'Products no longer available for order(the maximum number has been exceeded)');
        }
        return view('cart.order', compact('order'));
    }

    public function cartConfirm(Request $request)
    {
        if ((new Cart())->saveOrder($request)) {
            session()->flash('success', 'Your order has been confirmed!');
        } else {
            session()->flash('warning', 'Products no longer available for order(the maximum number has been exceeded)');
        }

        return redirect()->route('home');
    }
}
