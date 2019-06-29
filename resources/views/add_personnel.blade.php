@extends('pmaster')

@section('pcontent')
    
    <div class = "row">
        <form method="POST" action="{{route('personnels.store')}}">
            @csrf
            <div class = "col m8 offset-m2">
                
                <h5>Add New Staff</h5><hr>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="personnel_firstname">                           
                    <label>First Name</label>
                </div>
                
                <div class="input-field col s6">
                    <input type="text" class="validate" name="personnel_lastname">                           
                    <label>Last Name</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="personnel_phoneno">                           
                    <label>Phone Number</label>
                </div>
                <div class="input-field col s6">
                    <input type="email" class="validate" name="personnel_email">                           
                    <label>E-mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" class="validate" name="personnel_address">                           
                    <label>Postal Address</label>
                </div>
                <div class="input-field col s4">
                    <select name="personnel_department">
                        <option value="Administration">Administration</option>
                        <option value="Receptionist">Receptionist</option>
                        <option value="Accounts">Accounts</option>
                        <option value="Sales">Sales</option>
                        <option value="Customer Care">Customer Care</option>
                    </select>                          
                    <label>Department</label>
                </div>
                
                <div class="input-field col s4">
                    <input type="text" class="validate" name="personnel_id">                           
                    <label>Personnel ID</label></label>
                </div>

                <div class="input-field col s4">
                    <input type="number" class="validate" name="personnel_salary">                           
                    <label>Personnel Salary</label></label>
                </div>

                <div class="input-field col s12">
                    <textarea class="materialize-textarea" name="personnel_details"></textarea>                          
                    <label>Other Details</label></label>
                </div>

                <div class="input-field col s6">
                    <button class="btn green">Add Staff</button>
                </div>
            </div>
        </form>
            
    </div>

@endsection