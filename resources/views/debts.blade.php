@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">
        <h5 class="text-center">Debts / Debtors</h5>
        @if ($debts!=NULL)
          <div>
              <a href="/add_sales" class="btn btn-small btn-floating right pulse tooltipped" data-position="left" data-tooltip="New Order"><i class="material-icons">add_shopping_cart</i></a>
          </div>
        <table id="example" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>Date/Time </th>
                    <th>Customer Name</th>
                    <th>Invoice No</th>
                    <th>Debt Amount</th>
                    <th>Reason</th>
                    <th>Remarks</th>
                    
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($debts as $debt)
                
                <tr>
                    <td>{{$debt->created_at}}</td>
                    <td>{{$debt->customer_id}}</td>
                    <td>{{$debt->invoice_no}}</td>
                    <td>{{$debt->debt_amount}}</td>
                    <td>
                        @if ($debt->debt_reason=="Paid")
                            <span class="h3 green" style="display: block; padding: 3px; color: white; font-weight: bold;">
                                    {{$debt->debt_reason}}
                            </span>
                        @elseif($debt->debt_reason=="Part-Payment")
                            <span class="orange" style="display: block; padding: 3px; color: white; font-weight: bold;">
                                    {{$debt->debt_reason}}
                            </span>
                        @else
                            <span class="red" style="display: block; padding: 3px; color: white; font-weight: bold;">
                                    {{$debt->debt_reason}}
                            </span>
                        @endif
                        
                        </td>
                    <td>{{$debt->remarks}}</td>
                    
                    <td style="position: relative;">
                        <div class="fixed-action-btn horizontal direction-top direction-left click-to-toggle sales_action" style="position: relative !important; float: text-align: center; display: inline-block; bottom: 0px !important; padding: 0px !important">
                                <a class="btn-floating btn-small dark-purple waves-effect waves-light" style="display: inline-block" >
                                    <i class="small material-icons">menu</i>
                                </a>
                                <ul style="top: 0px !important">
                                    
                                    <li>
                                            <form method="POST" action="{{route('debts.destroy',$debt->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                                                </form>
                                    </li>
                          
                                    <li> 
                                            <a href="repay_debt/{{$debt->id}}" class="btn-floating btn-small waves-effect dark-yellow waves-light tooltipped" data-position="top" data-tooltip="Pay Debt"><i class="material-icons">attach_money</i></a>
                                    </li>
                          
                                    <li>
                                            <a href="reciept/{{$debt->invoice_no}}" target="_blank" class="btn-floating btn-small waves-effect blue waves-light tooltipped" data-position="top" data-tooltip="Print Reciept of this item"><i class="material-icons">print</i></a>          
                                    </li>
                          
                                    <li>
                                            <a href="invoice/{{$debt->invoice_no}}" target="_blank" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="Print Invoice of this item"><i class="material-icons">receipt</i></a>          
                                    </li>
                                </ul>
                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Date/Time</th>
                    <th>Product Name</th>
                    <th>Quantity Sold</th>
                    <th>Item Discount</th>
                    <th>Invoice No</th>
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