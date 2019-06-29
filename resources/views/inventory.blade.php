@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">
        <h5 class="text-center">Inventory</h5>
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
                    <td>
                        <form method="POST" action="{{route('inventory.destroy',$product->id)}}">
                            @csrf
                            @method('DELETE')
                        <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
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
@endsection