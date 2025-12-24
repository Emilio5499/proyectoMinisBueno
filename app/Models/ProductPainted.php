<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPainted extends Model
{
    protected $table = 'product_painted';

    protected $fillable = [
        'product_id',
        'extra_price',
        'is_active',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
