<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
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
        $data['categories'] = Category::where('status',1)->get();
        return view('main.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = new Product;
        $product->name = $request->name;
        $product->sku_code = $request->product_sku;
        $product->category_id = $request->category_id;
        $product->purchase_price = $request->purchase_price;
        $product->retail_price = $request->retail_price;
        $product->minimum_stock_alert = $request->stock_alert;
        $product->created_user_id = Auth::User()->id;
 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = '/uploads/' .time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads'), $filename); 
            $product->image = $filename;
        }

        $product->save();
        return redirect(url('/product/list'))->with('message', 'Product add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data['products'] = Product::get();
        return view('main.product.list',$data);

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
    public function destroy(string $id)
    {
        //
    }
}
