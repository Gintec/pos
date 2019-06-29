<?php

namespace App\Http\Controllers;

use App\Sales;
use App\Products;
use App\Stock;
use App\Customers;
use App\Invoices;
use App\Company;
use App\Debts;
use App\Personnel;
use Illuminate\Http\Request;
use Terbilang;
use DB;
use PDF;
use Carbon\Carbon;
use Auth;
use App\User;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Products::select('product_id','product_name','selling_price','model_name', 'product', 'made_year','id')->with(array('stock' => function($q){
            $q->select(array('product_id','quantity_remaining'));}))->get();
        
        $customers = Customers::all();
        return view('add_sales',compact('products'), ['customers'=>$customers]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->amount_paid==""){
            $request->amount_paid = 0;
        } 
        $invoice_no = "SI".substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 8);
        $balance = $request->total_due - $request->amount_paid;

        if($balance==0){
            $payment_status = "Paid";
        }elseif($request->amount_paid==0){
            $payment_status = "Unpaid";        
        }elseif($balance!=$request->amount_paid){
            $payment_status = "Part-Payment";
        }
        
        Invoices::create([
            'invoice_no'=>$invoice_no,
            'total_amount'=>$request->total_due,
            'total_discount'=>$request->total_discount,
            'tax'=>$request->tax,
            'payment_status'=>$payment_status,
            'balance'=>$balance,
            'customer_id'=>$request->customer_id,
            'invoice_date'=>now(),
            'invoice_remarks'=>$request->invoice_remarks." ".$request->pay_particulars
        ]);
        
        
        $i = 0;
        foreach ($request->product_id as $product_id){
            $quantity_sold = $request->input("quantity_sold.".$i);
            // RECORD SALES
            Sales::create([
                'product_id'=>$product_id,
                'quantity_sold'=>$quantity_sold,
                'amount'=>$request->amount[$i],
                'sales_id'=>$request->salesid,
                'item_discount'=>$request->item_discount[$i],
                'invoice_no'=>$invoice_no,
                'remarks'=>"Sold",
                'selling_price'=>$request->unit_cost[$i],
                'personnel_id'=>Auth::user()->user_id
                ]);
                
            // UPDATE STOCK - DECREASE
            Stock::where('product_id',"=",$product_id)->decrement('quantity_remaining', $quantity_sold);
            //  
            $i++;
        }

        if($balance>0){
            Debts::create([
                'customer_id'=>$request->customer_id,
                'invoice_no'=>$invoice_no,
                'debt_amount'=>$balance,
                'debt_reason'=>$request->pay_method,
                'remarks'=>$request->invoice_remarks                   
                ]);
        }
                
            
            //$invoice = Invoices::where('invoice_no','=',$invoice_no)->with(['Sales', 'Customers'])->get();
            $invoice = Invoices::where('invoice_no', $invoice_no)->first();
            // $sales = Sales::where('invoice_no', $invoice_no)->with(['product'])->get();
            $sales = Sales::where('invoice_no', $invoice_no)->with('product')->get();
            $customer = Customers::where('customer_id', $request->customer_id)->first();
            $company = Company::all()->first();
            
            
            $total_due = Terbilang::make($request->total_due,' Naira Only');
            $total_due = ucwords($total_due);
            $name = $request->name;
            //return redirect()->back();
            // error_log($request->total_due);
            
            if(isset($_POST['Invoice'])){
                return redirect()->route('invoice', [$invoice_no]);
            }else{
                
                return view('reciept',compact('invoice'), ['company'=>$company,'customer'=>$customer, 'sales'=>$sales,'total_due'=>$total_due, 'name'=>$name]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sales::findOrFail($id)->delete();
 
        session()->flash('message','The Sales record has been successfully deleted.');

        return redirect()->back();
    }

    public function view_sales(){
        $sales = Sales::with(['product','personnel'])->get();
        
        return view('view_sales',compact('sales'));
    }

    public function today_sales(){
        $sales = Sales::with('product')->whereDate('created_at', Carbon::today())->get();
        $yesterday_sales = Sales::with('product')->whereDate('created_at', Carbon::yesterday())->get();

        return view('today_sales',compact('sales'), ['yesterday_sales'=>$yesterday_sales]);
    }

    public function reciept($invoice_no){
         //$invoice = Invoices::where('invoice_no','=',$invoice_no)->with(['Sales', 'Customers'])->get();
         $invoice = Invoices::where('invoice_no', $invoice_no)->first();
         // $sales = Sales::where('invoice_no', $invoice_no)->with(['product'])->get();
         $sales = Sales::where('invoice_no', $invoice_no)->with('product')->get();
         $customer_id = $invoice->customer_id;
         $total_due = $invoice->total_amount;
         $customer = Customers::where('customer_id', $customer_id)->first();
         $company = Company::all()->first();

        
         $personnel_id = Sales::select('personnel_id')->where('invoice_no', $invoice_no)->first()->personnel_id;
         
         $name=User::select('name')->where('user_id',$personnel_id)->first();         
         $name = $name->name;
         
         $total_due = Terbilang::make($total_due,' Naira Only');
         $total_due = ucwords($total_due);
         //return redirect()->back();
         // error_log($request->total_due);
         return view('reciept',compact('invoice'), ['company'=>$company,'customer'=>$customer, 'sales'=>$sales,'total_due'=>$total_due, 'name'=>$name]);
    }

    public function invoice($invoice_no){
        ini_set('max_execution_time', 180);
        //$invoice = Invoices::where('invoice_no','=',$invoice_no)->with(['Sales', 'Customers'])->get();
        $invoice = Invoices::where('invoice_no', $invoice_no)->first();
        // $sales = Sales::where('invoice_no', $invoice_no)->with(['product'])->get();
        $sales = Sales::where('invoice_no', $invoice_no)->with('product')->get();
        $customer_id = $invoice->customer_id;
        $total_due = $invoice->total_amount;
        $customer = Customers::where('customer_id', $customer_id)->first();
        $company = Company::all()->first();
        
        
        if($invoice->balance > 0){
            $total_due = $invoice->balance;
            $total_due = Terbilang::make($total_due,' Naira Only');
            $total_due = ucwords($total_due);
        }else{
            $total_due = Terbilang::make($total_due,' Naira Only');
            $total_due = ucwords($total_due);
        }
        //return redirect()->back();
        // error_log($request->total_due);

        
        // Set extra option
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // pass view file
        $pdf = PDF::loadView('invoice',compact('invoice'), ['company'=>$company,'customer'=>$customer, 'sales'=>$sales,'total_due'=>$total_due])->save('./uploads/invoices/'.$invoice_no.'.pdf');
        // download pdf
        return $pdf->stream($invoice_no.'.pdf');
        
        // return view('invoice',compact('invoice'), ['company'=>$company,'customer'=>$customer, 'sales'=>$sales,'total_due'=>$total_due]);
   }


}
