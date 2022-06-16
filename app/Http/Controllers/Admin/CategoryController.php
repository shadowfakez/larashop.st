<?php

namespace App\Http\Controllers\Admin;

use App\Facades\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        $data['image'] = UploadImage::uploadCategoryImage($request);

        Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $data = $request->all();
        if ($request->file('image') !== null) {
            Storage::delete('public/images/categories/' . $category->image);
            $data['image'] = UploadImage::uploadCategoryImage($request);
        } else {
            $data['image'] = $category->image;
        }
        $category->fill($data);
        if ($category->isDirty()) {
            $category->save();
            return redirect()->route('admin.categories.index')->with('success', 'Category ' . $category->name . ' was successfully updated');
        } else {
            return redirect()->route('admin.categories.index')->with('warning', 'There is nothing to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        Storage::delete('public/images/categories/' . $category['image']);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category ' . $category->name . ' was successfully deleted');
    }
}
