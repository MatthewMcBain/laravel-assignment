<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = [
        'topping_name',
    ];

    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class);
    }

    public function orderItems(): BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class);
    }
}
