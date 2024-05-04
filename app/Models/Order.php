<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price'
    ];

    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
