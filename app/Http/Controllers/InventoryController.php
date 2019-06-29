<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\Stock;
use App\Products;
use App\Suppliers;
use PicoPrime\BarcodeGen\BarcodeGenerator;

class InventoryController extends Controller
{
     /**
     * @var \PicoPrime\BarcodeGen\BarcodeGenerator
     */
    protected $barcode;
    public function __construct(BarcodeGenerator $barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Inventory::with(['product', 'supplier'])->get();
        return view('inventory',compact('products'));
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
            'product_id' => 'required|min:2',
            'quantity_supplied' => 'required|min:1',
            'cost_price' => 'required|min:1'
        ]);

        // $supply_batchno = "SUB".substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 8);
        
        if($request->supply_batchno==""){
            $supply_batchno = "SUB".substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 8);
        }else{
            $supply_batchno = $request->supply_batchno;
        }
        
        Inventory::create([
            'product_id'=>$request->product_id,
            'supplier_id'=>$request->supplier_id,
            'date_supplied'=>$request->date_supplied,
            'quantity_supplied'=>$request->quantity_supplied,
            'cost_price'=>$request->cost_price,
            'supply_batchno'=>$supply_batchno,
            'remarks'=>$request->remarks
        ]);
        
        Stock::where('product_id','=',$request->product_id)->increment('quantity_remaining', $request->quantity_supplied);
        
        session()->flash('message','The New Items have been successfully added to the inventory. Click <a href="/gen_barcode/'.$request->product_id.'/'.$request->quantity_supplied.'" class="btn btn-small yellow"> Here </a> to generate and print out barcodes for the products!');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::findOrFail($id)->delete();
 
        session()->flash('message','The Inventory record has been successfully deleted.');

        return redirect()->back();
    }

    public function gen_barcode($product_id,$quantity){
        $code = \PicoPrime\BarcodeGen\BarcodeGen::generate([$product_id, 25, 'horizontal', 'code128', 1])->encode('data-url');
        $product = Products::select('product_name','selling_price','made_year', 'product','model_name')->where('product_id','=',$product_id)->first();
        
        return view('barcodes', ['product_id'=>$product_id,'quantity'=>$quantity, 'product'=>$product, 'code'=>$code]);

    }
}
