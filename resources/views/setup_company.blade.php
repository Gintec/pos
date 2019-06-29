@extends('pmaster')

@section('pcontent')
    
    <style>
        .subtitle{
            font-weight: bold;
        }
    </style>
    <div class = "row">
        
        <form method="POST" class = "col m7" action="{{route('company.update', $company->id)}}"  enctype="multipart/form-data">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" value="{{$company->id}}" name="id">
                <h5>Update Company Information</h5>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="company_name" value="{{chk($company->company_name)}}">                           
                    <label>Company Name</label>
                </div>
                
                <div class="input-field col s6">
                    <input type="text" class="validate" name="motto" value="{{chk($company->motto)}}">                           
                    <label>Company Motto / tagline</label>
                </div>
                <div class="input-field col s12">
                    <input class="validate" name="company_address" value="{{chk($company->company_address)}} ">                        
                    <label class="active">Company Address</label>
                </div>
                
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="company_services">{{chk($company->company_services)}}</textarea>                         
                    <label>Company Services</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="company_tel" value="{{chk($company->company_tel)}}">                           
                    <label>Company Phone Number</label>
                </div>
                <div class="input-field col s6">
                    <input type="email" class="validate" name="company_email" value="{{chk($company->company_email)}}">                           
                    <label>Company E-mail</label></label>
                </div>
                <div class="input-field col s5">
                    <input type="text" class="validate" name="company_website" value="{{chk($company->company_website)}}">                           
                    <label>Company Website</label></label>
                </div>
                <div class="input-field col s5">
                    
                    <input type="hidden" name="old_company_logo"  value="{{chk($company->company_logo)}}">
              
                    <div class = "row">
                            <label>Upload Logo</label>
                            <div class = "file-field input-field">
                               <div class = "btn">
                                  <span>Browse</span>
                                  <input type = "file" name="company-logo" />
                               </div>
                               
                               <div class = "file-path-wrapper">
                                  <input class = "file-path validate" type = "text"
                                     placeholder = "Upload Company Logo" />
                               </div>
                            </div>
                         </div>
                </div>
                
                <div class="input-field col s2">
                    <input type="color" name="color" id="color" class="validate"  value="{{chk($company->company_color)}}">                           
                    <label for="color" class="active">Company Color</label>
                </div>

                
                <h6 style="clear:both;">Banking Information</h6><hr>

                <div class="input-field col s4">
                    <input type="text" class="validate" name="company_account_no" value="{{chk($company->company_account_no)}}">                           
                    <label>Company Account Number</label></label>
                </div>
                <div class="input-field col s4">
                    <input type="text" class="validate" name="company_account_bank" value="{{chk($company->company_account_bank)}}">                           
                    <label>Company Banker</label></label>
                </div>
                <div class="input-field col s4"> 
                    <input type="text" class="validate" name="company_account_name" value="{{chk($company->company_account_name)}}">                           
                    <label>Company Account Name</label></label>
                </div>

                <div class="input-field col s12 float-right right text-right">
                    <button class="btn green">Save Settings</button>
                </div>
            
        </form>

        <div class = "col m5 card">
            <img src="/uploads/logo.jpg">
            <table class="striped">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">{{$company->company_name}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Motto:</td>
                        <td class="subtitle">{{$company->motto}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Address:</td>
                        <td class="subtitle">{{$company->company_address}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Services:</td>
                        <td class="subtitle">{{$company->company_services}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Telephone Nos:</td>
                        <td class="subtitle">{{$company->company_tel}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Logo:</td>
                        <td class="subtitle">{{$company->company_logo}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Color:</td>
                        <td style="background-color: {{$company->color}};" class="subtitle"></td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Email:</td>
                        <td class="subtitle">{{$company->company_email}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Website:</td>
                        <td class="subtitle">{{$company->company_website}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Account Number:</td>
                        <td class="subtitle">{{$company->company_account_no}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Account Name:</td>
                        <td class="subtitle">{{$company->company_account_name}}</td>                        
                    </tr>
                    <tr>
                        <td scope="row">Company Account Bank:</td>
                        <td class="subtitle">{{$company->company_account_bank}}</td>                        
                    </tr>
                </tbody>
            </table>
        </div>
            
    </div>

@endsection