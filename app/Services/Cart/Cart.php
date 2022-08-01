<?php

namespace App\Services\Cart;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Services\Currency\CurrencyConversion;
use Illuminate\Support\Facades\Mail;

class Cart
{
    protected $order;

    /**
     * @param bool $createOrder
     */
    public function __construct($createOrder = false)
    {
        $order = session('order');
        if (is_null($order) and $createOrder) {
            $data['currency_id'] = CurrencyConversion::getCurrentCurrencyFromSession()->id;
            $this->order = new Order($data);
            session(['order' => $this->order]);
        } else {
            $this->order = $order;
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function countAvailable($updateCount = false)
    {
        $products = collect([]);
        foreach ($this->order->products as $orderProduct)
        {
            $product = Product::findOrfail($orderProduct->id);
            if ($orderProduct->countInOrder > $orderProduct->count) {
                return false;
            }
            if ($updateCount) {
                $product->count -= $orderProduct->countInOrder;
                $products->push($product);
            }
        }

        if ($updateCount) {
            $products->map->save();
        }

        return true;
    }

    public function saveOrder($request)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        return $this->order->saveOrder($request);
    }

    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id', $product->id)->firstOrFail();
            if ($pivotRow->countInOrder < 2) {
                $this->order->products->pop($product->id);
            } else {
                $pivotRow->countInOrder--;
            }
        }
    }

    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id', $product->id)->firstOrFail();
            if ($pivotRow->countInOrder >= $product->count) {
                return false;
            }
            $pivotRow->countInOrder++;
        } else {
            if ($product->count == 0) {
                return false;
            }
            $product->countInOrder = 1;
            $this->order->products->push($product);
        }

        return true;
    }
}
