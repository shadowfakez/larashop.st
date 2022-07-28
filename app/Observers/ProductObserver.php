<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Subscription;

class ProductObserver
{
    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updating(Product $product)
    {
        $oldCount = $product->getOriginal('count');

        if ($oldCount == 0 and $product->count >0) {
            Subscription::sendEmailToSubscriber($product);
        }
    }
}
