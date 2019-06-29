<?php

namespace App\Http\Controllers;

use App\Customercategories;
use Illuminate\Http\Request;

class CustomercategoriesController extends Controller
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
        
        $this->validate($request,[
            'customer_category_name' => 'required|min:3'
        ]);
       
        Customercategories::create([
            'customer_category_name'=>$request->customer_category_name
        ]);
        session()->flash('message','The customer category:'.$request->customer_category_name.' has been added successfully!');
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customercategories  $customercategories
     * @return \Illuminate\Http\Response
     */
    public function show(Customercategories $customercategories)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customercategories  $customercategories
     * @return \Illuminate\Http\Response
     */
    public function edit(Customercategories $customercategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customercategories  $customercategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customercategories $customercategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customercategories  $customercategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customercategories::findOrFail($id)->delete();
 
        session()->flash('message','The Customercategories record has been successfully deleted.');

        return redirect()->back();
    }
}
