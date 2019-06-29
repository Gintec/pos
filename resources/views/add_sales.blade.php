@extends('pmaster')

@section('pcontent')

<style>
    .input-field{
        padding-top: 0px;
    }
    .delpos{
        height: 2em;
        width: 2em;
        position: absolute;
        top: 0px;
        right: 0px;
    }
</style>
    
    <div class = "row">
        <div class="col m6 offset-m3 input-field"><input type="text" id="item" placeholder="Enter Product Name or ID"></div>
        <input type="hidden" id="allproducts" value="{{json_encode($products)}}">
        <form class="col m12" method="POST" action="{{route('add_sales.store')}}" target="_blank" id="sales_form">
                @csrf
                <input type="hidden" name="name" value="{{Auth::user()->name}}">
            <div class = "col m5">
                <h5>Add Items</h5>
                <blockquote>Note: All figures are in Nigeria Naira.</blockquote>
                    
                        <div class="row">
                            <div class="input-field col m8 s12">
                            <select name="search_product" id="search_product" class="browser-default" style="width: 100% !important;">
                                    <option value="-" selected>Click Here</option>
                                    @foreach ($products as $product)  
                                   
                                    @if ($product->stock->quantity_remaining<1)
                                        <option value='{"product_name":"{{$product->product_name}}","product_id":"{{$product->product_id}}","selling_price":"{{$product->selling_price}}","quantity_remaining":"{{$product->stock->quantity_remaining}}"}' disabled>{{$product->product_name}} - finished in stock</option>
                                    @else
                                        <option value='{"product_name":"{{$product->product_name}}","product_id":"{{$product->product_id}}","selling_price":"{{$product->selling_price}}","quantity_remaining":"{{$product->stock->quantity_remaining}}"}'>{{$product->product_name}} - {{$product->model_name}} - {{$product->product}} - {{$product->made_year}}</option>
                                    @endif                                
                                    
                                    @endforeach
                            </select>                           
                            <label style = "position: absolute; top: -20px;">Search / Select Product</label>
                            </div>

                            <div class="input-field col m2">
                                <input type="number" name="quantity" class="validate" value="1" id="quantity" min="1" placeholder="Quantity">
                                <label>Quantity</label>
                            </div>

                            <div class="input-field col m2">
                                <div  id="1" class="btn-floating btn-large green pulse waves-effect waves-light add_item"><i class="material-icons">add</i></div>
                            </div>
                        </div>  
                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Total Discount</th>
                                        <th>Tax</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"><input type="number" name="total_discount" id="total_discount" value="0" readonly></td>
                                        <td><input type="number" name="tax" id="tax" value="0"></td>
                                        
                                    </tr>
                                    <tr style="font-weight: bold; color: green; font-size: 1.5em;">
                                        <td  style="text-align: right;">TOTAL DUE: </td>
                                        <td style="text-align: left;"><input type="number" name="total_due" id="total_due" value="0" style="font-size: 1em !important;" readonly></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    
            </div>
            
            <div class = "col m7">
                
                    <h5>List of Items</h5>
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                </tr>
                            </thead>
                            <tbody id="item_list">
                                
                                
                            </tbody>
                        </table>
                <div class="text-center" id="payarea" style="display: none;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Payment Method</th>
                                <th>Pay Particulars</th>
                                <th>Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="input-field">
                                <td scope="row">
                                    <select name="customer_id" id="customer_id">
                                        <option value="General" selected>General</option>
                                        @foreach ($customers as $customer)                                            
                                        <option value="{{$customer->customer_id}}">{{$customer->customer_name}}</option>
                                        @endforeach
                                    </select>
                                    
                                </td>
                                <td>
                                    <select name="pay_method" id="pay_method">
                                        <option value="Cash" selected>Cash</option>
                                        <option value="USSD Transfer">USSD Transfer</option>
                                        <option value="Internet Banking">Internet Banking</option>
                                        <option value="Bank Deposit">Bank Deposit</option>
                                        <option value="Others">Others</option>
                                        <option value="Unpaid">Unpaid</option>
                                        <option value="Part-Payment">Part-Payment</option>
                                    </select>
                                    
                                </td>
                                <td>
                                    <input type="text" name="pay_particulars" id="pay_particulars" placeholder="Bank notes">
                                    
                                </td>
                                <td>
                                    <input type="number" name="amount_paid" step="0.01" id="amount_paid">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="small" colspan="4"><a href="#" class="small" colspan="4" id="add_notes">Add Notes / Remarks</a></td>
                            </tr>
                           
                            <tr id="notearea">
                                <td class="input-field" colspan="4">
                                    <textarea name="invoice_remarks" id="invoice_remarks" class="materialize-textarea"></textarea>
                                <label for="invoice_remarks">Notes / Remarks</label>
                                </td>
                            </tr> 
                            
                            <tr id="submitt">
                                <td scope="row" colspan="2" style="text-align: center">
                                    <input name="salesid" id="salesid" type="hidden" value="ChangeLater">
                                    <button type="submit" name="Receipt" class="btn btn-large blue waves-effect waves-light sub" value="Print Receipt">Receipt
                                            <i class="material-icons right">send</i>
                                    </button>
                                </td>
                                <td scope="row" colspan="2" style="text-align: center">
                                    
                                    <button type="submit" name="Invoice" class="btn btn-large green waves-effect waves-light sub" value="Print Receipt">Invoice
                                            <i class="material-icons right">send</i>
                                    </button>
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>    
                
                
                
            </div>
            
        </form>
    </div>

@endsection