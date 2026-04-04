<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use function PHPUnit\Framework\isNull;


class CRUDCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();

        return view('admin.pages.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = null;
        $isSupercategory = true;
        $isEdit=false;
        $parentID=$request->parent_id??null;

        return view('admin.pages.category', compact('category', 'isSupercategory', 'isEdit', 'parentID'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try{
            $newName=$request->name;
            $parentID=$request->parent_id??null;

            Category::create([
                'name' => $newName,
                'parent_id'=>$parentID
            ]);

            return redirect()->route('admin.category.index');
        }catch(\Exception $ex){
            return back()->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::where('id', $id)->firstOrFail();
        $isEdit=true;

        $isSupercategory=false;
        if(isNull($category->parent_id))
            $isSupercategory=true;

        return view('admin.pages.category', compact('category', 'isSupercategory', 'isEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(CategoryRequest $request, string $id)
        {
            try{
                $newName=$request->name;

                Category::where('id', $id)->update(['name'=>$newName]);

                return redirect()->route('admin.category.index');
            }catch(\Exception $ex){
                return back()->withErrors($ex->getMessage());
            }

        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try{
            $category = Category::with([
                'children.products',
                'products',
                'children.specifications',
                'specifications'
            ])->findOrFail($id);

            $deleteProducts = function ($products) {
                foreach ($products as $product) {
                    $product->delete();
                }
            };


            if (is_null($category->parent_id)) {
                foreach ($category->children as $child) {

                    $child->specifications()->detach();

                    $deleteProducts($child->products);
                    $child->delete();
                }
            }

            $category->specifications()->detach();

            $deleteProducts($category->products);

            $category->delete();

            return response()->json(['success' => true]);

        } catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
