<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductColor extends Model
{
    protected $fillable = ['product_id', 'name'];

    //een kleur kan bij 1 product horen dus een belongsTo relatie
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
