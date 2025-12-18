<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function paintOptions()
    {
        return $this->belongsToMany(
            ProductPaintOption::class,
            'order_item_paint_options'
        )->withPivot('price')->withTimestamps();
    }

    public function hasPainting(): bool
    {
        return $this->paintOptions()->exists();
    }
}
