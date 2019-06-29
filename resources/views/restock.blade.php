@extends('pmaster')

@section('pcontent')
    
    <div class = "row">

        
        <form class="col s12" method="POST" action="{{route('inventory.store')}}">
            @csrf
            <div class = "col m6 offset-m3">
                
                    <h5>Restock {{ $products->product_name }}  ({{$products->product_id}})</h5>

                    <div class="row">
                        
                            <input type="hidden" value="{{$products->product_id}}" name="product_id">
                          
                        <div class="input-field col s8">
                                <select name="supplier_id">   
                                    <option value="General" selected>General</option>
                                    @foreach ($suppliers as $supplier)                                        
                                        <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_company}} ({{$supplier->supplier_name}})</option>                                    
                                    @endforeach
                                </select>                           
                                <label>Supplier Name</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="number" class="validate" name="quantity_supplied">                              
                            <label for="quantity_supplied">Quantity Purchased</label>
                        </div>

                        

                        <div class="input-field col s12">
                            <textarea name="remarks" id="remarks" class="materialize-textarea"> </textarea>                           
                            <label for="remarks">Remarks</label>
                        </div>
                        <div class="input-field col s4">
                            <input type="text" class="validate" name="supply_batchno" min="1">                              
                            <label for="supply_batchno">Batch Number</label>
                        </div>
                        
                        <div class="input-field col s4">
                            <input type="text" class="datepicker" name="date_supplied" placeholder="Date Supplied">                              
                            
                        </div>

                        <div class="input-field col s4">
                            <input type="number" class="validate" name="cost_price" step="0.01" value="0">                              
                            <label for="cost_price">Cost Price (Per Item)</label>
                        </div>                        
                          
                        <div class="row center">
                            <button type="submit" id="add_to-stock" class="waves-effect waves-light btn">Add to Stock</button>
                        </div>
                    </div>
            </div>
            

            

            </form>
        
    </div>

@endsection