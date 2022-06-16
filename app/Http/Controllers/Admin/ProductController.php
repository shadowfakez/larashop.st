<?php

namespace App\Http\Controllers\Admin;

use App\Facades\UploadImage;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.products.index', ['products' => Product::orderBy('created_at', 'asc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('admin.products.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['image'] = UploadImage::uploadProductImage($request);

        Product::create($data);

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($alias)
    {
        $product = Product::where('alias', $alias)->firstOrFail();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($alias)
    {
        $product = Product::where('alias', $alias)->firstOrFail();
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $alias)
    {
        $product = Product::where('alias', $alias)->firstOrFail();
        $data = $request->all();
        if ($request->file('image') !== null) {
            Storage::delete('public/images/' . $product->category->alias . '/' . $product->image);
            $data['image'] = UploadImage::uploadProductImage($request);
        } else {
            $data['image'] = $product->image;
        }
        $product->fill($data);
        if ($product->isDirty()) {
            $product->save();
            return redirect()->route('admin.products.index')->with('success', 'Product ' . $product->name . ' was successfully updated');
        } else {
            return redirect()->route('admin.products.index')->with('warning', 'There is nothing to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($alias)
    {
        $product = Product::where('alias', $alias)->firstOrFail();
        Storage::delete('public/images/' . $product->category->alias . '/' . $product['image']);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product ' . $product->name . ' was successfully deleted');
    }
}
