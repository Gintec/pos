@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">
        <h5 class="text-center">Customers Contact List</h5>
        @if ($customers!=NULL)
          <div>
              <a href="/add_customer" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
          </div>
        <table id="example" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>Contact Name</th>
                    <th>Customer ID</th>
                    <th>Customer Company</th>
                    <th>Phone Num.</th>
                    <th>Group</th>
                    <th>Category</th>
                    <th>Actions</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)

                  
                
                <tr>
                    <td>{{$customer->customer_name}}</td>
                    <td>{{$customer->customer_id}}</td>
                    <td>{{$customer->customer_company}}</td>
                    <td>{{$customer->customer_phoneno}}</td>
                    <td>{{$customer->customer_group}}</td>
                    <td>{{$customer->customer_category}}</td>
                    <td style="position: relative;">
                        <div class="fixed-action-btn horizontal direction-top direction-left click-to-toggle sales_action" style="position: relative !important; float: text-align: center; display: inline-block; bottom: 0px !important; padding: 0px !important">
                                <a class="btn-floating btn-small dark-purple waves-effect waves-light" style="display: inline-block" >
                                    <i class="small material-icons">menu</i>
                                </a>
                                <ul style="top: 0px !important">
                                    
                                    <li>
                                            <form method="POST" action="{{route('customers.destroy',$customer->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                                                </form>                                            
                                    </li>
                            
                                   
                            
                                    <li>
                                            <a href="contact_customer/{{$customer->customer_id}}/{{$customer->customer_phoneno}}/{{$customer->customer_email}}" class="btn-floating btn-small waves-effect blue waves-light tooltipped" data-position="top" data-tooltip="Contact This Customer"><i class="material-icons">contact_phone</i></a>          
                                    </li>
                            
                                    <li>
                                            <a href="customer_purchases/{{$customer->customer_id}}" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="View orders / purchases by this customer"><i class="material-icons">receipt</i></a>          
                                    </li>
                                    <li>
                                            <a href="add_sales/{{$customer->customer_id}}" class="btn-floating btn-large waves-effect purple waves-light tooltipped" data-position="top" data-tooltip="Make New Order for this Customer"><i class="material-icons">shopping_cart</i></a>          
                                    </li>
                                </ul>
                        </div>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                        <th>Contact Name</th>
                        <th>Customer ID</th>
                        <th>Customer Company</th>
                        <th>Phone Num.</th>
                        <th>Group</th>
                        <th>Category Location</th>
                        <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        
        @else
            <blockquote>No Products found in the database.</blockquote>
        @endif

    </div>
@endsection