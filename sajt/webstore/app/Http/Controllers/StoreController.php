<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $categories=Category::with('children')->whereNull('parent_id')->get();

        //zasto izdvajamo category.parent a ne category/category.child?
        $query=Product::with([
            'category.parent:id,name',
            'specifications:id,name',
            'thumbnail:id,product_id,image_path,image_alt,is_thumbnail'
        ]);

        //#region modifikovanje query-a u odnosu na kategoriju/podkategoriju
        if($request->category){
            $categoryId = $request->category;

            //uzmi children direktno iz baze
            $childIds = Category::where('parent_id', $categoryId)
                ->pluck('id')
                ->toArray();

            if(!empty($childIds))
                $query->whereIn('category_id', $childIds);
            else $query->where('category_id', $categoryId);
        }
        #endregion

        #region modifikovanje query-a u odnosu na ukucanu rec
        if($request->keyword && $request->keyword!=''){
            $keyword = strtolower($request->keyword);

            $query->whereRaw('LOWER(name) LIKE ?', ['%' . $keyword . '%']);
        }
        #endregion

        //#region modifikovanje query-a u odnosu na cenu
        if (!is_null($request->min_price) && !is_null($request->max_price)){
            $query->whereRaw(
                'COALESCE(discount_price, price) BETWEEN ? AND ?',
                [$request->min_price, $request->max_price]
            );
        }
        #endregion

        #region modifikovanje query-a u odnosu na dostupnost proizvoda
        if($request->stock){
            if($request->stock=='available')
                $query->where('stock', '<>', 0);
        }
        #endregion

        #region modifikovanje query-a u odnosu na popust proizvoda
        if($request->discount && $request->discount > 0){
            if($request->discount=='discount')
                $query->whereNotNull('discount_price');
        }
        #endregion

        #region modifikovanje query-a u odnosu na izabrano sortiranje
        switch ($request->sort){
            case 'nameASC':
                $query->orderBy('name', 'asc');
                break;

            case 'nameDESC':
                $query->orderBy('name', 'desc');
                break;

            case 'priceASC':
                $query->orderBy('price', 'asc');
                break;

            case 'priceDESC':
                $query->orderBy('price', 'desc');
                break;
        }
        #endregion

        $products=$query->paginate(8)->withQueryString();

        //ako smo primenili neki od filtera/sortiranja proizvoda
        if($request->ajax())
            return view('partials.productcards', compact('products'))->render();


        return view('pages.store', compact('categories', 'products'));
    }
}
