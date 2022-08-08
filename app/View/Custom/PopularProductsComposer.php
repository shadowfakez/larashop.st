<?php

namespace App\View\Custom;

use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;

class PopularProductsComposer
{
    public function compose(View $view)
    {
        $popularProductIds = Order::all()->map->products->flatten()->map->pivot->mapToGroups(function ($pivot) {
            return [$pivot->product_id => $pivot->count];
        })->map->sum()->sortDesc()->take(4)->keys()->toArray();

        $popularProducts = Product::whereIn('id', $popularProductIds)->get();

        $view->with('popularProducts', $popularProducts);
    }
}
