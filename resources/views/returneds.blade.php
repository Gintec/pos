@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">
        <h5 class="text-center">Returned Items</h5>
        @if ($returneds!=NULL)
          
        <table id="example" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>Date Returned </th>
                    <th>Product Name</th>
                   
                    <th>Quantity Returned</th>
                    <th>Invoice No</th>
                    <th>Status</th>
                    <th>Amount</th>
                    
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($returneds as $item)

                  
                
                <tr>
                    <td>{{$item->date_returned}}</td>
                    <td>{{$item->product->product_name}} - {{$item->product->model_name}} - {{$item->product->made_year}} - {{$item->product->product}}</td>
                    <td>{{$item->quantity_returned}}</td>
                    
                    <td>{{$item->invoice_no}}</td>
                    <td>{{$item->return_status}}</td>
                    <td>{{$item->amount_returned}}</td>
                    
                    <td style="position: relative;">
                        <div class="fixed-action-btn horizontal direction-top direction-left hover-to-toggle sales_action" style="position: relative !important; float: text-align: center; display: inline-block; bottom: 0px !important; padding: 0px !important">
                                <a class="btn-floating btn-small dark-purple waves-effect waves-light" style="display: inline-block" >
                                    <i class="small material-icons">menu</i>
                                </a>
                                <ul style="top: 0px !important">
                                    
                                    <li>
                                        <form method="POST" action="{{route('returneds.destroy',$item->id)}}">
                                            @csrf
                                            @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                                        </form>
                                    </li>

                                    <li>
                                            <a href="invoice/{{$item->invoice_no}}" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="Print Invoice of this item"><i class="material-icons">receipt</i></a>          
                                    </li>

                                    <li>
                                            <a href="return_stock/{{$item->quantity_returned}}/{{$item->product_id}}/{{$item->item_id}}" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="Return item to stock"><i class="material-icons">autorenew</i></a>          
                                    </li>
                                </ul>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Date Returned </th>
                    <th>Product Name</th>
                    
                    <th>Quantity Returned</th>
                    <th>Invoice No</th>
                    <th>Status</th>
                    <th>Amount</th>
                    
                    <th>Actions</th>     
                </tr>
            </tfoot>
        </table>
        
        @else
            <blockquote>No Sales found in the database.</blockquote>
        @endif

    </div>
@endsection