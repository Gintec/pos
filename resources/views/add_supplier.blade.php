@extends('pmaster')

@section('pcontent')
    
    <div class = "row">

        
        <form class="col s12" method="POST" action="{{route('suppliers.store')}}">
            @csrf
            <div class = "col m6 offset-m3">
                
                    <h5>ADD NEW SUPPLIER</h5>

                    <div class="row">
                        
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="supplier_name">                              
                            <label for="supplier_name">Contact Person</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="validate" name="supplier_company">                              
                            <label for="supplier_company">Company Name</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="validate" name="supplier_category">                              
                            <label for="supplier_category">Supplier Category</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="validate" name="supplier_phoneno">                              
                            <label for="supplier_phoneno">Phone Numbers</label>
                            <small>If multiple numbers seperated each by a comma</small>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="validate" name="supplier_email">                              
                            <label for="supplier_email">Suppliers Email Address </label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="validate" name="supplier_address">                              
                            <label for="supplier_address">Suppliers Physical Address</label>
                        </div>

                        <div class="input-field col s12">
                                <select name="supplier_items[]" id="search_product" class="browser-default" multiple>                                        
                                        @foreach ($products as $product)                                        
                                        <option value='{{$product->product_name}}'>{{$product->product_name}}</option>
                                        @endforeach
                                </select>                           
                                <label style = "position: absolute; top: -20px;">Search / Select Product Supplied</label>    
                        </div>

                        <div class="input-field col s12">
                            <input type="text" name="supplier_remarks" id="supplier_remarks" class="validate">                          
                            <label for="supplier_remarks">Add Notes / Remarks</label>
                        </div>
                          
                        <div class="row center">
                            <button type="submit" id="add_supplier" class="waves-effect waves-light btn">Add Supplier</button>
                        </div>
                    </div>
            </div>
            

            

            </form>
        
    </div>

@endsection