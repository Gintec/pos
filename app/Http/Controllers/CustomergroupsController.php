<?php

namespace App\Http\Controllers;

use App\Customergroups;
use Illuminate\Http\Request;

class CustomergroupsController extends Controller
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
        Customergroups::all();
        $this->validate($request,[
            'customer_group_name' => 'required|min:3'
        ]);
       
        Customergroups::create([
            'customer_group_name'=>$request->customer_group_name
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customergroups  $customergroups
     * @return \Illuminate\Http\Response
     */
    public function show(Customergroups $customergroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customergroups  $customergroups
     * @return \Illuminate\Http\Response
     */
    public function edit(Customergroups $customergroups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customergroups  $customergroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customergroups $customergroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customergroups  $customergroups
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customergroups::findOrFail($id)->delete();
 
        session()->flash('message','The Customergroups record has been successfully deleted.');

        return redirect()->back();
    }
}
