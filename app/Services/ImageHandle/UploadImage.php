<?php

namespace App\Services\ImageHandle;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class UploadImage
{
    public function uploadCategoryImage($request)
    {
        if ($request->file('image')) {

            $fileName = date("Y-m-d-H-i-s") . '_' . $request->file('image')->getClientOriginalName();

            Storage::putFileAs('public/images/categories/', $request->file('image'), $fileName);

            return $fileName;
        }
    }

    public function uploadProductImage($request)
    {


        if ($request->file('image')) {
            $category = Category::findOrFail($request->category_id)->alias . '/';

            $fileName = date("Y-m-d-H-i-s") . '_' . $request->file('image')->getClientOriginalName();

            Storage::putFileAs('public/images/' . $category, $request->file('image'), $fileName);

            return $fileName;
        }
    }

}

