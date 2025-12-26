<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'unit_price',
        'is_painted',
        'paint_extra_price',
        'quantity',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function makeFromProduct(
        Product $product,
        int $quantity,
        bool $painted = false
    ): self {
        $paintExtra = $painted ? $product->paintExtraPrice() : 0;

        $unit = $product->price + $paintExtra;
        $subtotal = $unit * $quantity;

        return new self([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'unit_price' => $product->price,
            'is_painted' => $painted,
            'paint_extra_price' => $paintExtra,
            'quantity' => $quantity,
            'subtotal' => $subtotal,
        ]);
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
