<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(ProductsFilterRequest $request)
    {
        $productQuerry = Product::with('category');
        if ($request->filled('price_from')) {
            $productQuerry->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productQuerry->where('price', '<=', $request->price_to);
        }
        foreach (['new', 'hit', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productQuerry->where($field, 1);
            }
        }
        $products = $productQuerry->orderBy('updated_at', 'desc')->paginate(3)->withPath('?' . $request->getQueryString());
        return view('products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($alias)
    {
        $product = Product::where('alias', $alias)->firstOrFail();
        return view('products.show', ['product' => $product]);
    }
}
