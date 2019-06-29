<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Customercategories;
use App\Customergroups;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all();
        return view('customers', ['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customergroups = Customergroups::all();
        $customercategories = Customercategories::all();
        return view('add_customer', ['customergroups'=>$customergroups,'customercategories'=>$customercategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'customer_name' => 'required|min:3'
        ]);

        if($request->customer_company==""){
            $customer_company = "-";
        }else{
            $customer_company=$request->customer_company;
        }

        if($request->customer_phoneno==""){
            $customer_phoneno = "-";
        }else{
            $customer_phoneno=$request->customer_phoneno;
        }
       $customer_id=str_replace(substr($request->customer_name,0,5),' ','').substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 5);

        Customers::create([
            'customer_name'=>$request->customer_name,
            'customer_company'=>$customer_company,
            'customer_phoneno'=>$customer_phoneno,
            'customer_email'=>$request->customer_email,
            'customer_address'=>$request->customer_address,
            'customer_group'=>$request->customer_group,
            'customer_id'=>$customer_id,
            'customer_remarks'=>$request->customer_remarks,
            'customer_category'=>$request->customer_category
        ]);

        session()->flash('message','The customer: '.$request->customer_name.' has been added successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::findOrFail($id)->delete();
 
        session()->flash('message','The Customer record has been successfully deleted.');

        return redirect()->back();
    }

    public function contact_customers(){
        $customers = Customers::all();
        $all_numbers = "";
        foreach($customers as $customer){
            $all_numbers.=$customer->customer_phoneno.",";
        }
        $all_numbers = rtrim($all_numbers,',');
        return view('contact_customers', ['customers'=>$customers,'all_numbers'=>$all_numbers]);
    }

    public function send_message(Request $request){
        return view('customers');
    }
}
