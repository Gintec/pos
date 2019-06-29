@extends('pmaster')

@section('pcontent')
    
    <div class = "row">
        
            <div class = "col card dark m8">
                <h5>Product Stock</h5>

                <table class="table table-dark">
                    <thead>
                        <th>Product Name</th>
                        <th>Product ID</th>
                        <th>Quantity Remaining</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $item)
                            <tr>
                                <td>{{$item->product}}</td>
                                <td>{{$item->product_id}}</td>
                                <td>{{$item->quantity_remaining}}</td>
                                <td><a href="{{route('stock.restock',$item->product_id)}}">Restock</a>
                                    <form method="POST" action="{{route('stock.destroy',$item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                                        </form>
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
               
            </div>
            <div class = "col card dark m4">
                <h5>Restock Product</h5>

                <form action="{{route('stock.restock')}}" method="post">
                    <div class="input-field col s6">
                        <select name="product_id" id="product_id">
                            @foreach ($products as $product)
                            <option value="{{$product->product_id}}">{{$cgroup->product_name}}</option> 
                            @endforeach
                            <option value="-" selected>None</option> 
                        </select>
                        <label>Select Product</label>
                    </div>
                    
                    <div class="input-field col s6">
                        <select name="supplier_id" id="supplier_id">
                                @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option> 
                                @endforeach
                                <option value="-" selected>None</option>                            
                        </select>                           
                        <label>Supplier Name</label>
                    </div>
    
                    <div class="input-field col s12">
                        <input type="text" class="validate" name="quantity_purchase">                           
                        <label>Quantity Purchased</label></label>
                    </div>

                    <div class="input-field col s12">
                        <input type="date" class="datepick" name="date_purchased">                           
                        <label>Date Purchased</label></label>
                    </div>
    
                    <div class="input-field col s6">
                        <button class="btn green">Add Customer</button>
                    </div>
                </form>
                    
            </div>
        
    </div>

@endsection