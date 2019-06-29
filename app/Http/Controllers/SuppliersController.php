<?php

namespace App\Http\Controllers;

use App\Suppliers;
use Illuminate\Http\Request;
use App\Products;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('suppliers',['suppliers'=>$suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
            return view('add_supplier',['products'=>$products]);
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
            'supplier_name' => 'required|min:3'
        ]);

        
        $supplier_id = "SU".substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 8);
        $suppliers = "";
        $supplier_items = serialize($request->supplier_items);
        Suppliers::create([
            'supplier_name'=>$request->supplier_name,
            'supplier_company'=>$request->supplier_company,
            'supplier_phoneno'=>$request->supplier_phoneno,
            'supplier_email'=>$request->supplier_email,
            'supplier_address'=>$request->supplier_address,
            'supplier_items'=>$supplier_items,
            'supplier_id'=>$supplier_id,
            'supplier_remarks'=>$request->supplier_remarks,
            'supplier_category'=>$request->supplier_category            
        ]);

        session()->flash('message','The New Supplier Information has been added successfully!');
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(Suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Suppliers::findOrFail($id)->delete();
 
        session()->flash('message','The Suppliers record has been successfully deleted.');

        return redirect()->back();
    }
}
