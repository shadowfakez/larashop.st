<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
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

    public function categoriesMain()
    {
        return view('categories.index', ['categories' => Category::orderBy('created_at', 'asc')->paginate(4)]);
    }

    public function categoryShow($alias)
    {
        $category = Category::where('alias', $alias)->firstOrFail();
        $products = Product::where('category_id', $category->id)->paginate(3);
        $category_name = $category->name;
        return view('categories.show', ['category_name' => $category_name, 'products' => $products]);
    }
}
