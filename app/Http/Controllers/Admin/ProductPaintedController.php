<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPainted;
use Illuminate\Http\Request;

class ProductPaintedController extends Controller
{
    public function edit(Product $product)
    {
        $painted = $product->paintedOption;

        return view('admin.products.painted', compact('product', 'painted'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'extra_price' => 'required|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        ProductPainted::updateOrCreate(
            ['product_id' => $product->id],
            $data
        );

        return back()->with('success', 'Opción de pintado actualizada');
    }
}
