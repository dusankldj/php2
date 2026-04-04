<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\CartItems;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $productId = $request->product_id;
        $userId = auth()->id();

        DB::transaction(function () use ($userId, $productId) {

            $cart = Cart::firstOrCreate([
                'user_id' => $userId
            ]);

            $product = Product::findOrFail($productId);

            //provera zaliha
            if ($product->stock <= 0)
                abort(400, 'Out of stock');

            //da li postoji u cart-u
            $item = CartItems::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->first();

            if($item)
                $item->increment('quantity');
            else{
                CartItems::create([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'quantity' => 1
                ]);
            }

            //smanji stanje on stock
            $product->decrement('stock');

            return response()->json([
                'message' => 'Product added to cart!'
            ]);
        });
    }

    public function index(Request $request)
    {
        $userId = auth()->id();

        $cart = Cart::with(['items.product.thumbnail'])
            ->where('user_id', $userId)
            ->first();

        $products = $cart ? $cart->items : collect();

        return view('pages.cart', compact('products'));
    }

    public function removeItem(Request $request){
        $productId = $request->product_id;
        $userId = auth()->id();

        DB::transaction(function () use ($productId, $userId) {

            $cart = Cart::where('user_id', $userId)->firstOrFail();

            $item = CartItems::with('product')
                ->where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->firstOrFail();

            // vrati stock
            $item->product->increment('stock', $item->quantity);

            // obriši item
            $item->delete();
        });

        return response()->json([
            'message' => 'Item removed from cart'
        ]);
    }

    public function clear(){
        $userId = auth()->id();

        DB::transaction(function () use ($userId){

            $cart = Cart::with('items.product')
                ->where('user_id', $userId)
                ->first();

            if (!$cart)
                return;

            //  vrati stock za svaki item
            foreach ($cart->items as $item)
                $item->product->increment('stock', $item->quantity);


            //  obriši sve item-e iz korpe
            $cart->items()->delete();
        });

        return response()->json([
            'message' => 'Cart cleared'
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $productId = $request->productID;
        $newQuantity = (int) $request->new_quantity;
        $userId = auth()->id();

        DB::transaction(function () use ($productId, $newQuantity, $userId) {

            $cart = Cart::where('user_id', $userId)->firstOrFail();

            $item = CartItems::with('product')
                ->where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->firstOrFail();

            $currentQuantity = $item->quantity;
            $difference = $newQuantity - $currentQuantity;

            if ($difference == 0)
                return;

            $product = $item->product;

            // ako povećavaš quantity
            if ($difference > 0) {

                if ($product->stock < $difference)
                    abort(400, 'Not enough stock');


                $product->decrement('stock', $difference);
            }

            // ako smanjuješ quantity
            elseif ($difference < 0)
                $product->increment('stock', abs($difference));


            // update quantity
            $item->update([
                'quantity' => $newQuantity
            ]);
        });

        return response()->json([
            'message' => 'Quantity updated'
        ]);
    }
}
