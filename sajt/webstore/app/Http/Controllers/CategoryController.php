<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function writeCategories()
    {
        $products = Product::with([
            'category.parent:id,name',
            'specifications:id,name',
            'thumbnail:id,product_id,image_path,image_alt,is_thumbnail'
        ])
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->get();

        return view('pages.home', compact('categories', 'products'));
    }

    public function getSpecs($id)
    {
        $category = Category::with('parent.specifications')->findOrFail($id);

        $specs = $category->parent->specifications->map(function ($spec) {
            return [
                'id' => $spec->id,
                'name' => $spec->name
            ];
        });

        return response()->json($specs);
    }
}
