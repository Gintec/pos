@extends('pmaster')

@section('pcontent')
    
    <div class = "row">
        <form method="POST" action="{{route('customers.store')}}">
            @csrf
            <div class = "col m8">
                
                <h5>New Customer</h5>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="customer_name">                           
                    <label>Customer Name</label>
                </div>
                
                <div class="input-field col s6">
                    <input type="text" class="validate" name="customer_company">                           
                    <label>Company Company</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="customer_phoneno">                           
                    <label>Customer Phone Number</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="customer_email">                           
                    <label>Customer E-mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" class="validate" name="customer_address">                           
                    <label>Customer Address</label>
                </div>
                <div class="input-field col s6">
                    <select name="customer_group" id="customer_group">
                        @foreach ($customergroups as $cgroup)
                        <option value="{{$cgroup->customer_group_name}}">{{$cgroup->customer_group_name}}</option> 
                        @endforeach
                        <option value="-" selected>None</option> 
                    </select>
                    <label>Customer Group</label>
                </div>
                
                <div class="input-field col s6">
                    <select name="customer_category" id="customer_category">
                            @foreach ($customercategories as $ccategory)
                            <option value="{{$ccategory->customer_category_name}}">{{$ccategory->customer_category_name}}</option> 
                            @endforeach
                            <option value="-" selected>None</option>                            
                    </select>                           
                    <label>Customer Category</label>
                </div>

                <div class="input-field col s12">
                    <input type="text" class="validate" name="customer_remarks">                           
                    <label>Notes of Customer</label></label>
                </div>

                <div class="input-field col s6">
                    <button class="btn green">Add Customer</button>
                </div>
            </div>
        </form>
            <div class = "col card dark m4">
                <h5>List of Customer Categories</h5>

                <ul>
                    @foreach ($customercategories as $ccategory)
                        <li style="display:block; padding:5px; border-bottom: groove 1px grey;">{{$ccategory->customer_category_name}}</li> 
                    @endforeach
                    
                </ul>

                <form action="{{route('customercategories.store')}}" method="post">
                    @csrf
                    <div class="input-field col s9">
                        <input type="text" class="validate" name="customer_category_name">                           
                        <label>Enter New Customer Category</label></label>
                    </div>
    
                    <div class="input-field col s3">
                        <button class="btn green">Add</button>
                    </div>
                </form>
            </div>
            <div class = "col card dark m4">
                    <h5>List of Customer Groups</h5>
                    <ul>
                            @foreach ($customergroups as $cgroup)
                                <li style="display:block; padding:5px; border-bottom: groove 1px grey;">{{$cgroup->customer_group_name}}</li> 
                            @endforeach
                            
                    </ul>

                <form action="{{route('customergroups.store')}}" method="post">
                    @csrf
                    <div class="input-field col s9">
                        <input type="text" class="validate" name="customer_group_name">                           
                        <label>Enter New Customer Category</label></label>
                    </div>
    
                    <div class="input-field col s3">
                        <button class="btn green">Add</button>
                    </div>
                </form>
            </div>
        
    </div>

@endsection