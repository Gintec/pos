<?php

namespace App\Http\Controllers;

use App\Debts;
use App\Invoices;
use Illuminate\Http\Request;

class DebtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debts = Debts::all();
        return view('debts', ['debts'=>$debts]);
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
     * @param  \App\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function show(Debts $debts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function edit(Debts $debts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debts $debts)
    {
        
        if($request->pay_amount>=$request->debt_amount){
            $reason = "Paid";
        }else{
            $reason = "Part-Payment";
        }
        

        $balance = $request->debt_amount - $request->pay_amount;
        
        $debt = Debts::where('id','=', $request->id);
        $debt->update([
            'debt_amount'=>$balance,
            'debt_reason'=>$reason,
            'remarks'=>$request->remarks
        ]);

        $invoice = Invoices::where('invoice_no','=', $request->invoice_no);
        $invoice->update([
            'payment_status'=>$reason
        ]);

        // UPDATE DEBT - DECREASE
        $invoice->decrement('balance', $request->pay_amount);
            

        session()->flash('message','The Debt: '.$request->invoice_no.' has been updated successfully! Click <a href="/invoice/'.$request->invoice_no.'/'.$request->quantity_supplied.'" class="btn btn-small yellow"> Here </a> to Print Receipt');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Debts  $debts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Debts::findOrFail($id)->delete();
 
        session()->flash('message','The Debt record has been successfully deleted.');

        return redirect()->back();
    }

    public function repay_debt($id){
        $debt = Debts::where('id','=',$id)->first();
        
        return view('repay_debt', ['debt'=>$debt]);
    }
}
