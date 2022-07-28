<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $orders = Order::where('name', Auth::user()->name)->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', compact('orders'));
    }

    public function subscribe(Request $request, Product $product)
    {
        Subscription::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
            ]);

        return redirect()->back()->with('success', 'When ' . $product->name . ' becomes available, you will receive an email!');
    }
    public function changeLocale($locale)
    {
        $availableLocales = ['en', 'ua'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
