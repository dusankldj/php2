<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecificationRequest;
use App\Models\Category;
use App\Models\CategorySpecifications;
use App\Models\Specification;
use Illuminate\Http\Request;
use Mockery\Exception;

class SpecificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->with('specifications')
            ->get();

        return view('admin.pages.specifications', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category_id = $request->category_id;

        return view("admin.pages.spec", compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecificationRequest $request)
    {
        try{
            $name=$request->name;
            $category_id=$request->category_id;

            $newSpec=Specification::create([
                'name'=>$name
            ]);

            CategorySpecifications::create([
               'category_id'=>$category_id,
                'specification_id'=>$newSpec->id
            ]);

            return redirect()->route('admin.specifications.index');
        }catch(Exception $e){
            return back()->withErrors(['error' => $e->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            CategorySpecifications::where('specification_id', $id)->delete();

            Specification::findOrFail($id)->delete();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
