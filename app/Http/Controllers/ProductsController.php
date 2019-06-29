<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Suppliers;
use App\Stock;
use App\Inventory;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('stock')->orderBy('product_name', 'asc')->paginate(50);
        $all_products = Products::select('product_id','product_name', 'made_year', 'product', 'model_name')->get();
        return view('products',compact('products'), ['all_products'=>$all_products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $products = Products::all();
            $suppliers = Suppliers::all();
            return view('products_form',['products'=>$products,'suppliers'=>$suppliers]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|min:3'
        ]);

        if($request->product_id==""){
            $product_id = strtoupper(substr($request->product_name,0,3)).substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 4);
        }else{
            $product_id = $request->product_id;
        }
        $suppliers = serialize($request->supplier_id);
        
        Products::create([
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
            'selling_price'=>$request->selling_price,
            'measurement_unit'=>$request->measurement_unit,
            'size'=>$request->size,
            'product_category'=>$request->product_category,
            'product_type'=>$request->product_type,
            'product_status'=>$request->product_status,
            'supplier_id'=>$suppliers,
            'product_location'=>$request->product_location,            
            'product_id'=>$product_id,
            'model_name'=>$request->model_name,
            'product'=>$request->product,
            'made_year'=>$request->made_year,
            'part_number'=>$request->part_number
        ]);

        Stock::create([
            'product_id'=>$product_id,
            'quantity_remaining'=>$request->quantity,
        ]);
        session()->flash('message','The New Product: '.$request->product_name.' has been added successfully!');
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $suppliers = "";
        foreach ($request->supplier_id as $supplier){
            $suppliers.=$supplier;
        }

        $product = Products::where('product_id','=', $request->product_id);
        $product->update([
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
            'selling_price'=>$request->selling_price,
            'measurement_unit'=>$request->measurement_unit,
            'size'=>$request->size,
            'product_category'=>$request->product_category,
            'product_type'=>$request->product_type,
            'product_status'=>$request->product_status,
            'supplier_id'=>$suppliers,
            'product_location'=>$request->product_location,
            'made_year'=>$request->made_year,
            'model_name'=>$request->model_name,
            'product'=>$request->product,
            'part_number'=>$request->part_number,           
            
        ]);

        session()->flash('message','The Product: '.$request->product_name.' has been updated successfully!');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::findOrFail($id)->delete();
 
        session()->flash('message','The Products record has been successfully deleted.');

        return redirect()->back();
    }

    public function edit_product($product_id)
    {
        $product = Products::where('product_id','=',$product_id)->first();      
        $products = Inventory::where('product_id', $product_id)->get();
        return view('product', ['product'=>$product, 'products'=>$products]);

    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'required|min:3'
        ]);
        
        $keyword = $request->keyword;
        
        $products = Products::where('product_id', '=',$keyword)->paginate(50);
        $all_products = Products::select('product_id','product_name', 'made_year', 'product', 'model_name')->get();
        return view('product_search',compact('products'), ['all_products'=>$all_products]);
    }
}
