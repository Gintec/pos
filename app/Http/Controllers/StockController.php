<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Products;
use App\Suppliers;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::findOrFail($id)->delete();
 
        session()->flash('message','The Stock record has been successfully deleted.');

        return redirect()->back();
    }

    // MY RESTOCK FUNCTION

    public function restock($product_id)
    {
        //$product_id = Input::get('product_id');
        $stocks = Stock::where('product_id','=',$product_id)->first();
        $products = Products::where('product_id','=',$product_id)->first();
        $suppliers = Suppliers::all();
        
        return view('restock', ['stocks'=>$stocks,'products'=>$products,'suppliers'=>$suppliers]);

    }
}
