<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Images;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        # code...
    }

    public function index()
    {
        $products=Product::all();

        $images = DB::table('images')
                ->join('products', 'images.product_id', '=', 'products.id')
                ->get();
        
        return view('carts.index', compact('products', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image_url" => $product->image_url
                ]
            ];
            
            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart sucessfully!');
                
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect('/carts')->with('success', 'Product added to cart succesfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image_url" => $product->image_url 
        ];

        session()->put('cart', $cart);

        return redirect('/carts')->with('success', 'Product added to cart succesfully!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->id and $request->quantity){
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');

            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            
            session()->flash('success', 'Product removed successfully');
        }
    }
}
