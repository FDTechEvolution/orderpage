<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductsByCategory(Request $request)
    {
        $product_category_id = $request->product_category_id;
        $products = Product::where('product_category_id', $product_category_id)->pluck('name', 'id');
        return response()->json($products);
    }
}
