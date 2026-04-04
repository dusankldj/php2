<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function writeCategories()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->get();

        return view('pages.home', compact('categories'));
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
