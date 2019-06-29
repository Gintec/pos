<?php

namespace App\Http\Controllers;

use App\Posadmin;
use Illuminate\Http\Request;

class PosadminController extends Controller
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
     * @param  \App\Posadmin  $posadmin
     * @return \Illuminate\Http\Response
     */
    public function show(Posadmin $posadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posadmin  $posadmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Posadmin $posadmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posadmin  $posadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posadmin $posadmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posadmin  $posadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posadmin::findOrFail($id)->delete();
 
        session()->flash('message','The Posadmin record has been successfully deleted.');

        return redirect()->back();
    }
}
