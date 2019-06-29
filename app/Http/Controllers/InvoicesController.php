<?php

namespace App\Http\Controllers;

use App\Invoices;
use Illuminate\Http\Request;
use App\Customers;
use App\Sales;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoices::findOrFail($id)->delete();
 
        session()->flash('message','The Invoice record has been successfully deleted.');

        return redirect()->back();
    }

    public function customer_purchases($customer_id){
        $csales = Invoices::where('customer_id','=',$customer_id)->with('sales')->first();
        $customers = Customers::where('customer_id','=',$customer_id)->first();
        // error_log($csales);
        return view('customer_purchases', compact('csales'),['customers'=>$customers]);
    }
}
