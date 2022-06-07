<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
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
