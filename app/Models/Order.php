<?php

namespace App\Models;

use App\Mail\OrderCreated;
use App\Services\Cart\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'email'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function saveOrder($request)
    {
        if ($this->status == 'not confirmed') {
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
            //$this->value = $this->getTotalValue();
            $this->save();
            Mail::to($email)->send(new OrderCreated($this));

            session()->forget('orderId');
            self::eraseTotalValue();
            return true;
        } else {
            return false;
        }
    }

    public function countFullValue()
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getValue();
        }
        return $sum;
    }

    public static function eraseTotalValue()
    {
        session()->forget('full_order_value');
    }

    public static function changeTotalValue($changeValue)
    {
        $value = self::getTotalValue() + $changeValue;
        session(['full_order_value' => $value]);
    }

    public static function getTotalValue()
    {
        return session('full_order_value', 0);
    }
}
