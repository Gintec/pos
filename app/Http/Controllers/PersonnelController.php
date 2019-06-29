<?php

namespace App\Http\Controllers;

use App\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::all();
        return view('personnel', ['personnels'=>$personnels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_personnel');
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
            'personnel_firstname' => 'required|min:3'
        ]);

        if($request->personnel_id==""){
            $personnel_id = strtoupper(substr($request->personnel_firstname,0,5)).substr(md5(uniqid(mt_rand(), true).microtime(true)),0, 8);
        }else{
            $personnel_id = $request->personnel_id;
        }
        
        Personnel::create([
            'personnel_firstname'=>$request->personnel_firstname,
            'personnel_lastname'=>$request->personnel_lastname,
            'personnel_phoneno'=>$request->personnel_phoneno,
            'personnel_email'=>$request->personnel_email,
            'personnel_address'=>$request->personnel_address,
            'personnel_department'=>$request->personnel_department,
            'personnel_id'=>$request->personnel_id,
            'personnel_details'=>$request->personnel_details,
            'personnel_id'=>$personnel_id,
            'personnel_details'=>$request->personnel_details,            
            'personnel_salary'=>$request->personnel_salary
        ]);

        
        session()->flash('message','The New Staff: '.$request->personnel_firstname.' has been added successfully!');
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personnel::findOrFail($id)->delete();
 
        session()->flash('message','The Personnel record has been successfully deleted.');

        return redirect()->back();
    }
}
