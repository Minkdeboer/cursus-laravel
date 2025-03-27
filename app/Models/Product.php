<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $images
 * @property mixed $colors
 * @property mixed|string $image
 */
class Product extends Model
{
    use HasFactory;

    //Vulbare velden
    protected $fillable = [
        'image',
        'name',
        'price',
        'short_description',
        'qty',
        'sku',
        'description',
    ];

    //Een product kan meerdere kleuren hebben dus een product heeftMany kleuren
    public function colors(): HasMany
    {
        return $this->hasMany(ProductColor::class);
    }

    //Een product kan meerdere images hebben dus een product heeftMany images
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);

    }
}
