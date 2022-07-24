<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
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

    public function getValue()
    {
        if (!is_null($this->pivot->count)) {
            return $this->price * $this->pivot->count;
        } else {
            return $this->price;
        }
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
        /*get: fn ($value) => ucfirst($value),*/
            set: fn($value) =>
            $this->attributes['new'] = $value === 'on' ? 1 : 0,
        );
    }

    protected function hit(): Attribute
    {
        return Attribute::make(
        /*get: fn ($value) => ucfirst($value),*/
            set: fn($value) =>
            $this->attributes['hit'] = $value === 'on' ? 1 : 0,
        );
    }

    protected function recommend(): Attribute
    {
        return Attribute::make(
        /*get: fn ($value) => ucfirst($value),*/
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
}
