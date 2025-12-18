<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPaintOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItems()
    {
        return $this->belongsToMany(
            OrderItem::class,
            'order_item_paint_options'
        )->withPivot('price')->withTimestamps();
    }
}
