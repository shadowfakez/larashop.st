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
}
