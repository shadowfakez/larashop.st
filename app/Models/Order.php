<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getTotalValue()
    {
        $sum = 0;
        foreach($this->products as $product) {
            $sum += $product->getValue();
        }
        return $sum;
    }

    public function saveOrder($name, $phone)
    {
        if ($this->status == null) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 'confirmed';
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }


    }
}
