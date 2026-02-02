<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Product model for Yummilicious bakery items (cakes, cookies, pastries).
 */
class Product extends Model
{
    /** @var array<int, string> Mass assignable attributes */
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'stock',
        'image',
    ];

    /** @var array<string, string> Attribute casting */
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];
}
