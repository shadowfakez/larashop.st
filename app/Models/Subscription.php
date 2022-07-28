<?php

namespace App\Models;

use App\Mail\SendEmailToSubscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];

    public function scopeActiveByProductId($query, $product_id)
    {
        return $query->where('status', 'not available')->where('product_id', $product_id);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public static function sendEmailToSubscriber(Product $product)
    {
        $subscriptions = self::activeByProductId($product->id)->get();

        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->user->email)->send(new SendEmailToSubscriber($product));
            $subscription->status = 'available';
            $subscription->save();
        }
    }
}

