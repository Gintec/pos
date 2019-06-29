<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::first();
        return view('setup_company', ['company'=>$company]);
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
            'company_name' => 'required|min:3',
            'company_logo' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        if($request->company_logo!=""){
            $logo = $request->company_logo;
            // SET UPLOAD PATH 
            $destinationPath = 'uploads'; 
            // GET THE FILE EXTENSION
            $extension = $logo->getClientOriginalExtension();             
            // RENAME THE UPLOAD WITH RANDOM NUMBER 
            $fileName = 'logo.'.$extension; 
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
            $logo->move($destinationPath, $fileName); 
        }

      
        if($request->file('company_logo')!=NULL){
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName(); 
            $file->storeAs('public', $filename);            
        }else{
            $filename = "logo.jpg";
        }

        Company::create([
            'company_name'=>$request->company_name,
            'motto'=>$request->motto,
            'company_address'=>$request->company_address,
            'company_services'=>$request->company_services,
            'company_tel'=>$request->company_tel,
            'company_logo'=>$filename,
            'color'=>$request->color,
            'company_email'=>$request->company_email,
            'company_website'=>$request->company_website,
            'company_account_no'=>$request->company_account_no,
            'company_account_bank'=>$request->company_account_bank,
            'company_account_name'=>$request->company_account_name
        ]);

            

        session()->flash('message','The Company Information chas been saved successfully!');
        
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request, [
            'company_name' => 'required|min:3',
            'company_logo' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        
        
        if($request->file('company_logo')!=""){
            $logo = $request->file('company_logo');
            // SET UPLOAD PATH 
            $destinationPath = 'uploads'; 
            // GET THE FILE EXTENSION
            $extension = $logo->getClientOriginalExtension();             
            // RENAME THE UPLOAD WITH RANDOM NUMBER 
            $fileName = 'logo.'.$extension; 
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
            $logo->move($destinationPath, $fileName); 
        }

      
        if($request->file('company_logo')!=""){
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName(); 
            $file->storeAs('public', $filename);            
        }else{
            $filename = "logo.jpg";
        }
        error_log($request->id);
        
        $company = Company::where('id','=', $request->id);
        $company->update([
            'company_name'=>$request->company_name,
            'motto'=>$request->motto,
            'company_address'=>$request->company_address,
            'company_services'=>$request->company_services,
            'company_tel'=>$request->company_tel,
            'company_logo'=>$filename,
            'color'=>$request->color,
            'company_email'=>$request->company_email,
            'company_website'=>$request->company_website,
            'company_account_no'=>$request->company_account_no,
            'company_account_bank'=>$request->company_account_bank,
            'company_account_name'=>$request->company_account_name        
            
        ]);

        session()->flash('message','The New Company Information chas been saved successfully!');
       
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id)->delete();
 
        session()->flash('message','The Company record has been successfully deleted.');

        return redirect()->back();
    }

    
}
