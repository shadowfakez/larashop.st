<?php

namespace App\Models;

use App\Mail\OrderCreated;
use App\Services\Cart\Cart;
use App\Services\Currency\CurrencyConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'name',
        'user_id',
        'phone',
        'email',
        'currency_id',
        'sum'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price')->withTimestamps();
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function saveOrder($request)
    {

        if (Auth::check()) {
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $this->user_id = Auth::id();
        } else {
            $name = $request->name;
            $email = $request->email;
        }
        $this->name = $name;
        $this->email = $email;
        $this->phone = $request->phone;
        $this->status = 'confirmed';
        $this->sum = $this->getSumInDefaultCurrency();

        $products = $this->products;
        $this->save();

        foreach ($products as $productInOrder) {
            $this->products()->attach($productInOrder, [
                'count' => $productInOrder->countInOrder,
                'price' => $productInOrder->price
            ]);
        }

        Mail::to($email)->send(new OrderCreated($this));

        session()->forget('order');
        return true;
    }

    public function getTotalValue()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->price  * $product->countInOrder;
        }
        return $sum;
    }

    public function getSumInDefaultCurrency() {
        if (CurrencyConversion::getCurrencyCode() == CurrencyConversion::DEFAULT_CURRENCY_CODE) {
            return $this->getTotalValue();
        } else {
            return $this->getTotalValue() / CurrencyConversion::getCurrencyRate();
        }
    }

    public function getSumInCurrentCurrency() {
        if (CurrencyConversion::getCurrentCurrencyFromSession()->code == CurrencyConversion::DEFAULT_CURRENCY_CODE) {
            return round($this->sum, 2) . ' ' . CurrencyConversion::getCurrencySymbol();
        } else {
            return round($this->sum * CurrencyConversion::getCurrencyRate(), 2) . ' ' . CurrencyConversion::getCurrencySymbol();
        }
    }
}
