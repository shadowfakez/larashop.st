<?php

namespace App\Models;

use App\Services\Currency\CurrencyConversion;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'category_id',
        'name',
        'alias',
        'description',
        'short_desc',
        'image',
        'price',
        'new',
        'hit',
        'recommend',
        'count',
    ];

    public $with = ['category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */

    protected function new(): Attribute
    {
        return Attribute::make(
            set: fn($value) =>
            $this->attributes['new'] = $value === 'on' ? 1 : 0,
        );
    }

    protected function hit(): Attribute
    {
        return Attribute::make(
            set: fn($value) =>
            $this->attributes['hit'] = $value === 'on' ? 1 : 0,
        );
    }

    protected function recommend(): Attribute
    {
        return Attribute::make(
            set: fn($value) =>
            $this->attributes['recommend'] = $value === 'on' ? 1 : 0,
        );
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }

    public function isAvailable(): bool
    {
        return $this->count > 0;
    }

    public function checkSubscription()
    {
        if (Subscription::where('user_id', Auth::user()->id)->where('product_id', $this->id)->where('status', "not available")->exists()) {
            return true;
        }
        return false;
    }

    public function getPriceAttribute($value)
    {
        return round(CurrencyConversion::convert($value), 2);
    }
}
