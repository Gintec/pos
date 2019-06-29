@extends('pmaster')

@section('pcontent')
    
    <div class = "row">

        
        <form class="col m10 offset-m1 card" method="POST" action="{{route('products.update', $product->product_id)}}">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class = "col m6">
                
                    <h5>Add New Product</h5>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" class="validate" name="product_name" value="{{$product->product_name}}">                              
                            <label>Product Name</label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="validate" name="product_id" value="{{$product->product_id}}" readonly>                              
                            <label>Product ID/Code</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea name="product_description" id="product_description" class="materialize-textarea">{{$product->product_description}}</textarea>                           
                            <label for="product_description">Product Description</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="number" class="validate" name="selling_price"  value="{{$product->selling_price}}" step="0.01">                              
                            <label>Selling Price</label>
                        </div>

                        <div class="input-field col s4">
                            <input type="number" class="validate" name="size"  value="{{$product->size}}">                              
                            <label>Size</label>
                        </div>
                        <div class="input-field col s4">
                                <select name="measurement_unit">   
                                    <option  value="{{$product->measurement_unit}}">{{$product->measurement_unit}}</option>
                                    <option value="Centimeters">Centimeters</option>
                                    <option value="Millimeters">Millimeters</option>
                                    <option value="Grams">Grams</option>
                                    <option value="Kilograms" selected>Kilograms</option>
                                    <option value="Cartons">Cartons</option>
                                    <option value="Packets">Packets</option>
                                    <option value="Pairs">Pairs</option>
                                    <option value="Bags">Bags</option>
                                    <option value="Pounds">Pounds</option>
                                    <option value="Once">Once</option>
                                    <option value="Pieces">Pieces</option>
                                    <option value="Liters">Liters</option>
                                    <option value="Satchets">Satchets</option>
                                    <option value="Set">Set</option>
                                </select>  

                                                           
                                <label>Unit of Measurement</label>
                        </div>
                          
                    </div>
            </div>
            <div class = "col m6">
                <h5>Product Details</h5>
                <blockquote>Fields marked * are required</blockquote>
                    
                        <div class="row">
                         
                            <div class="input-field col s6">
                                <select name="product_category">
                                    <option  value="{{$product->measurement_unit}}">{{$product->measurement_unit}}</option>
                                    <option value="Lubricants" selected>Lubricants</option>
                                    <option value='Headlamp'>Headlamp</option>
                                    <option value='Rearlamp'>Rearlamp</option>
                                    <option value='Bothlamp'>Bothlamp</option>
                                    <option value='Fender'>Fender</option>
                                    <option value='Foglamp'>Foglamp</option>
                                    <option value='Front Grill'>Front Grill</option>
                                    <option value='Bumper Grill'>Bumper Grill</option>
                                    <option value='Front Bumper'>Front Bumper</option>
                                    <option value='Back Bumper'>Back Bumper</option>
                                    <option value='Fog Lamp Cover'>Fog Lamp Cover</option>
                                    <option value='Plate number Sitting'>Plate number Sitting</option>
                                    <option value='Doors'>Doors</option>
                                    <option value='Both Chrome'>Both Chrome</option>
                                    <option value='Bonnet Chrome'>Bonnet Chrome</option>
                                    <option value='Bonnets'>Bonnets</option>
                                    <option value='Sand Protector'>Sand Protector</option>
                                    <option value='Murdguard'>Murdguard</option>
                                    <option value='Bumper Chromes'>Bumper Chromes</option>
                                    <option value='Bumper Mat'>Bumper Mat</option>
                                    <option value='Both'>Both</option>
                                    <option value='Side Mirror'>Side Mirror</option>
                                    <option value='Side Step'>Side Step</option>
                                    <option value='Bucket'>Bucket</option>
                                    <option value='Both Cover'>Both Cover</option>
                                    <option value='Both Spoiler'>Both Spoiler</option>
                                    <option value='Logos'>Logos</option>
                                    <option value='Steering'>Steering</option>
                                    <option value='Fender Rubbers'>Fender Rubbers</option>
                                    <option value='Reflectors'>Reflectors</option>
                                    <option value='Towing Van Covers'>Towing Van Covers</option>
                                    <option value='Pointers'>Pointers</option>
                                    <option value='Bonnet Catcher Mat'>Bonnet Catcher Mat</option>
                                    <option value='Bubars'>Bubars</option>
                                    <option value='Bumper Padded'>Bumper Padded</option>
                                    <option value='Fender Padded'>Fender Padded</option>
                                    <option value='Roofrags'>Roofrags</option>
                                    <option value='Exhaust Murflars'>Exhaust Murflars</option>
                                    <option value='Front Grill Chrome'>Front Grill Chrome</option>
                                    <option value='Headlamp Chrome'>Headlamp Chrome</option>
                                    <option value='Door Handle'>Door Handle</option>
                                    <option value='Door Chromes'>Door Chromes</option>
                                    <option value='Door Padded'>Door Padded</option>
                                    <option value='Tailboard'>Tailboard</option>
                                    <option value='Tailboard Cover'>Tailboard Cover</option>
                                    <option value='tailboard Light'>tailboard Light</option>
                                    <option value='Side Mirror Ends'>Side Mirror Ends</option>
                                </select>                              
                                <label>Product Category</label>
                            </div>

                            <div class="input-field col s6">
                                <input type="text" class="validate" name="product_type" value="{{$product->product_type}}">                              
                                <label>Product Type</label>
                            </div>

                            <div class="input-field col s6">
                                <input type="text" class="validate" name="product_status"  value="{{$product->product_status}}">                              
                                <label>Product Status</label>
                            </div> 

                            <div class="input-field col s6">
                                <select name="supplier_id[]" multiple>
                                    <option  value="{{splitArray($product->supplier_id)}}" selected>{{splitArray($product->supplier_id)}}</option>
                                    <option value="Random Purchase">Random Purchase</option>
                                </select>                                                     
                                <label>Major Supplier(s)</label>
                            </div>

                            <div class="input-field col s12">
                                <input type="text" class="validate" name="product_location" value="{{$product->product_location}}">                              
                                <label>Other Remarks</label>
                            </div>                        


                        </div>

                        <div class="row">
                            <div class="input-field col s3">
                                <input type="text" class="validate" name="model_name" value="{{$product->model_name}}">                              
                                <label>Model</label>
                            </div>

                            <div class="input-field col s3">
                                <input type="text" class="validate" name="product"  value="{{$product->product}}">                              
                                <label>Product</label>
                            </div> 

                            <div class="input-field col s3">
                                <input type="text" class="validate" name="part_number" value="{{$product->part_number}}">                              
                                <label>Part Number</label>
                            </div>

                            <div class="input-field col s3">
                                <input type="text" class="validate" name="made_year"  value="{{$product->made_year}}">                              
                                <label>Year</label>
                            </div> 
                        </div>

                        
                    
            </div>

            <div class="row center">
                <button type="submit" id="add_product" class="waves-effect waves-light btn">Update Product</button>
            </div>

            </form>

            <div class="col m10 offset-m1 card">
                
                <h5 class="text-center center">Product Supplies</h5>

                @if ($products!=NULL)
            
                <table id="example" class="display responsive-table" style="width:100%;;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product Name</th>
                            <th>Supplier</th>
                            <th>Date Supplied</th>
                            <th>Quantity Supplied</th>
                            <th>Cost Price (P)</th>
                            <th>Supply Batch</th>
                            <th>Remarks</th>   
                            <th>Delete</th>                 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)

                        
                        
                        <tr>
                            <td>{{$product->product->product_name}} (ID: {{$product->product->product_id}}) </td>
                            <td>{{$product->supplier->supplier_name}}</td>
                            <td>{{$product->date_supplied}}</td>
                            <td>{{$product->quantity_supplied}}</td>
                            <td>{{$product->cost_price}}</td>
                            <td>{{$product->supply_batchno}}</td>
                            <td>{{$product->batch_no}}</td>
                            <td><a href="?deleteinventory={{$product->id}}" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="Delete Record"><i class="material-icons">delete</i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Supplier</th>
                            <th>Date Supplied</th>
                            <th>Quantity Supplied</th>
                            <th>Cost Price (P)</th>
                            <th>Supply Batch</th>
                            <th>Remarks</th> 
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
                
                @else
                    <blockquote>No Inventory found in the database.</blockquote>
                @endif
            </div>
        
    </div>

@endsection