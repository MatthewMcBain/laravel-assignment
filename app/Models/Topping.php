<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topping extends Model
{
    use HasFactory;

    protected $fillable = [
        'topping_name',
    ];

    public function pizzas(): HasMany
    {
        return $this->hasMany(Pizza::class);
    }
    
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
