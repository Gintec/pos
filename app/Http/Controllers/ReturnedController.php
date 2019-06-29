<?php

namespace App\Http\Controllers;

use App\Returned;
use Illuminate\Http\Request;
use App\Sales;
use App\Personnel;
use App\Stock;
use App\Invoices;

class ReturnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returneds = Returned::with(['product'])->get();
        return view('returneds',['returneds'=>$returneds] );
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
        $this->validate($request, [
            'quantity_returned' => 'required',
            'return_reason' => 'required'
        ]);

        
        Returned::create([
            'product_id'=>$request->product_id,
            'invoice_no'=>$request->invoice_no,
            'quantity_returned'=>$request->quantity_returned,
            'date_returned'=>now(),
            'return_reason'=>$request->return_reason,
            'collected_by'=>$request->collected_by,
            'amount_returned'=>$request->amount_returned,
            'item_id'=>$request->item_id
        ]);
        
        Sales::where('id',"=",$request->item_id)->decrement('quantity_sold', $request->quantity_returned);
        Sales::where('id',"=",$request->item_id)->decrement('amount', $request->amount_returned);
        Invoices::where('invoice_no',"=",$request->invoice_no)->decrement('total_amount', $request->amount_returned);

        session()->flash('message','The item has been successfully added to returned stock!');
        $returneds = Returned::with(['product'])->get();
        return view('returneds',['returneds'=>$returneds] );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function show(Returned $returned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function edit(Returned $returned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Returned $returned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Returned::findOrFail($id)->delete();
 
        session()->flash('message','The Returned record has been successfully deleted.');

        return redirect()->back();
    }

    public function return_item($id){
        $item = Sales::where('id','=',$id)->with(['product'])->first();
        $personnels = Personnel::select('personnel_firstname','personnel_lastname', 'personnel_id')->get();
        return view('return_item', ['item'=>$item, 'personnels'=>$personnels]);
    }

    public function return_stock($quantity_returned,$product_id, $item_id){
        // UPDATE STOCK - DECREASE
        Stock::where('product_id',"=",$product_id)->increment('quantity_remaining', $quantity_returned);
        
        $returned = Returned::where([['product_id','=', $product_id],['item_id','=',$item_id]]);
        $returned->update(['return_status'=>"Returned to Inventory Stock"]);

        session()->flash('message','The item has been successfully retured to stock Inventory and can be resold!');
        return redirect()->back();
        
    }
}
