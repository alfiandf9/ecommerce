<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Image;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->model = new Product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()){
            $products = DB::table('products')->where('products.user_id', '=', Auth::user()->id)->get();
            return view('admin.products.index', compact('products'));
        }else{
            $products = Product::all();
            return view('index', compact('products'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:products,name',
            'price'=> 'required|numeric',
            'description' => 'required',
        ]);
        //
        $product = new Product();
        $product->user_id   = Auth::user()->id;
        $product->name      = $request->post('name');
        $product->price     = $request->post('price');
        $product->description  = $request->post('description');
        $product->save();

        return redirect('admin/products')->with('success', 'Produk berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
        
        $images = DB::table('images')
                ->join('products', 'images.product_id', '=', 'products.id')
                ->where('products.id', '=', $id)
                ->get();
        return view('admin.products.show', compact('product', 'images'));
        // if($product){
        //     return view('show', compact('product'));
        // }else{
        //     return redirect('/products')->with('errors', 'Produk tidak ditemukan');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price'=> 'required|numeric',
            'description' => 'required',
        ]);

        Product::whereId($id)->update($validatedData);

        return redirect('admin/products')->with('success', 'Produk berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('admin/products')->with('success', 'Produk berhasil dihapus');
    }
}
