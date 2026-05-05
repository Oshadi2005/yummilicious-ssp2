<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id', // Changed from 'category'
        'quantity',    // ✅ use quantity (not stock)
        'sold',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity' => 'integer',
        'sold' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
