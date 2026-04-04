<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $product = Product::with([
            'thumbnail',
            'category.parent',
            'specifications',
            'images'
        ])->findOrFail($request->productID);

        return view('pages.product', compact('product'));
    }
}
