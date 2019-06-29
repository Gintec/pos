@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">
        <h5 class="text-center">List of Suppliers</h5>
        @if ($suppliers!=NULL)
          <div>
              <a href="/add_supplier" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
          </div>
        <table id="example" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>Contact Person</th>
                    <th>Supplier ID</th>
                    <th>Supplier Company</th>
                    <th>Items Supplied</th>
                    <th>Phone Number</th>                   
                    <th>View</th>  
                    <th>Delete</th>                  
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)

                  
                
                <tr>
                    <td>{{$supplier->supplier_name}}</td>
                    <td>{{$supplier->supplier_id}}</td>
                    <td>{{$supplier->supplier_company}}</td>
                    <td>{{splitArray($supplier->supplier_items)}}</td>
                    <td>{{$supplier->supplier_phoneno}}</td>                   
                   <td><a href="sales/{{$supplier->supplier_id}}" class="btn-floating btn-small waves-effect waves-light tooltipped" data-position="top" data-tooltip="View Sales for this Supplier"><i class="material-icons">remove_red_eye</i></a></td>
                   <td>
                        <form method="POST" action="{{route('suppliers.destroy',$supplier->id)}}">
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
                    <th>Contact Person</th>
                    <th>Supplier ID</th>
                    <th>Supplier Company</th>
                    <th>Items Supplied</th>
                    <th>Phone Number</th>                   
                    <th>View</th>   
                    <th>Delete</th>    
                </tr>
            </tfoot>
        </table>
        
        @else
            <blockquote>No Suppliers found in the database.</blockquote>
        @endif

    </div>
@endsection