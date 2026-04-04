<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\CartItems;
use App\Models\Category;
use App\Models\Image;
use App\Models\Specification;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function showAddProductPage(){
        $isEdit=false;

        return view('admin.pages.product');
    }

    public function edit(string $id)
    {
        $product=Product::with([
                    'category.parent:id,name',
                    'specifications:id,name',
                    'images'
               ])->where('id', $id)->first();

        $categories=Category::all();

        $categorySpecs = $product->category->parent->specifications;
        $productSpecs = $product->specifications;

        $specs = $categorySpecs->map(function ($spec) use ($productSpecs) {
            $productSpec = $productSpecs->firstWhere('id', $spec->id);
            return [
                'id' => $spec->id,
                'name' => $spec->name,
                'value' => $productSpec?->pivot->value
            ];
        });
        $isEdit=true;

        return view('admin.pages.product', compact('product', 'categories', 'specs', 'isEdit'));
    }


    public function addProduct(InsertProductRequest $request){
        try{
            $discount_price="";

            if($request->discount_price=="")
                $discount_price=null;

            DB::transaction(function () use ($request,$discount_price){
                $product=Product::create([
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'discount_price'=>$request->discount_price,
                    'description'=>$request->description,
                    'stock'=>$request->quantity,
                    'category_id'=>$request->category,
                    'created_at'=>now(),
                    'updated_at'=>now()
                ]);

                $this->updateImages($request->file('images'), $product);

                $this->insertSpecs($request->spec_value, $product);
            });
        }catch(\Exception $ex){
            return response()->json([
                "message"=>$ex->getMessage()
            ]);
        }

        return redirect()->route('admin.dashboard');
    }

    public function insertSpecs($specs, $product)
    {
        $allowedSpecs = $product->category->parent->specifications->pluck('id')->toArray();

        foreach ($specs as $specId => $value) {
            // preskoči ako nije dozvoljena specifikacija
            if (!in_array($specId, $allowedSpecs))
                continue;

            if (empty($value))
                continue;

            ProductSpecification::create([
                'product_id' => $product->id,
                'specification_id' => $specId,
                'value' => $value
            ]);
        }
    }

    public function redirectToCreateProduct(){
        $isEdit=false;

        return view('admin.pages.product', compact('isEdit'));
    }

    public function changeThumbnail(Request $request){
        $imageID = $request->image_id;
        $image = Image::findOrFail($imageID);

        DB::transaction(function () use ($image, $imageID) {
            Image::where('product_id', $image->product_id)
                ->update([
                    'is_thumbnail' => 0,
                    'updated_at'=>now()
                ]);

            Image::where('id', $imageID)
                ->update([
                    'is_thumbnail' => 1,
                    'updated_at'=>now()
                ]);
        });

        return response()->json([
            "status"=>"Success",
            "new_thumbnail_id"=>$imageID
        ]);
    }

    public function deleteImage(Request $request){
        $imageID = $request->image_id;
        $image=Image::findOrFail($imageID);
        $productID = $image->product_id;
        $images = Image::where('product_id', $productID)->get();

        if($images->count()==1)
            return response()->json([
               'message'=>"You can't delete only image of product."
            ], 400);

        DB::transaction(function () use ($image, $productID) {
           $isThumbnail=$image->is_thumbnail;

           $image->delete();

           if($isThumbnail){
               $newThumbnail = Image::where('product_id', $productID)->first();

               if ($newThumbnail) $newThumbnail->update(['is_thumbnail' => 1]);
           }
        });

            return response()->json([
                'message' => 'Success'
            ]);
    }

    public function updateImages($images, $product)
    {
        if (!$images) return;

        $hasThumbnail = Image::where('product_id', $product->id)
            ->where('is_thumbnail', 1)
            ->exists();

        //uzmi poslednji index
        $lastIndex = array_key_last($images);

        foreach ($images as $index => $file) {

            $originalName = $file->getClientOriginalName();

            $exists = Image::where('image_path', 'products_images/' . $originalName)->exists();

            if ($exists)
                throw ValidationException::withMessages([
                    'images' => 'Image with this name already exists.'
                ]);

            $file->storeAs('products_images', $originalName, 'public');

            Image::create([
                'product_id' => $product->id,
                'image_path' => 'products_images/' . $originalName,
                'image_alt' => pathinfo($originalName, PATHINFO_FILENAME),

                'is_thumbnail' => !$hasThumbnail && $index == $lastIndex ? 1 : 0
            ]);
        }
    }


    public function updateSpecs($specs, $productID){
        foreach ($specs as $specId => $value) {
                ProductSpecification::updateOrCreate(
                [
                    'product_id' => $productID,
                    'specification_id' => $specId,
                ],
                [
                    'value' => $value
                ]);
        }
    }

        public function editProduct(UpdateProductRequest $request, $id)
        {
            $product = Product::findOrFail($id);

            // update osnovnih podataka
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'description' => $request->description,
                'stock' => $request->quantity,
                'category_id' => $request->category,
                'updated_at'=>now()
            ]);

            //poziv update-a za sliku/slike
            $this->updateImages($request->file('images'), $product);

            $this->updateSpecs($request->spec_value, $product->id);

            return back()->with('success', 'Product updated');
        }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::transaction(function () use ($request) {
            $product = Product::findOrFail($request->id);

            CartItems::where('product_id', $product->id)->delete();

            $product->specifications()->detach();

            $product->delete();
        });

        return response()->json([]);
    }

    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function showProductPage(){
        $isEdit=false;
        $product=null;
        $categories=Category::all();
        $specs = [];

        return view('admin.pages.product', compact('product','categories', 'specs', 'isEdit'));
    }
}
