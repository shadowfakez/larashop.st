<?php

namespace App\Services\Cart;

use App\Models\Order;
use App\Models\Product;

class Cart
{
    protected $order;

    /**
     * @param bool $createOrder
     */
    public function __construct($createOrder = false)
    {
        $orderId = session('orderId');
        if (is_null($orderId) and $createOrder) {
            $this->order = Order::create();
            session(['orderId' => $this->order->id]);
        } else {
            $this->order = Order::findOrFail($orderId);
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function countAvailable()
    {
        foreach ($this->order->products as $orderProduct)
        {
            if ($orderProduct->count < $this->getPivotRow($orderProduct)->count){
                return false;
            }
        }
        return true;
    }

    public function saveOrder($request)
    {
        if (!$this->countAvailable()) {
            return false;
        }
        return $this->order->saveOrder($request);
    }

    protected function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }

    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $addToCount = $this->getPivotRow($product);
            if ($addToCount->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $addToCount->count--;
                $addToCount->update();
            }
        }

        Order::changeTotalValue(-$product->price);
    }

    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $addToCount =  $this->getPivotRow($product);
            $addToCount->count++;
            if ($addToCount->count > $product->count) {
                return false;
            }
            $addToCount->update();
        } else {
            if ($product->count == 0) {
                return false;
            }
            $this->order->products()->attach($product->id);
        }

        Order::changeTotalValue($product->price);
        return true;
    }
}
