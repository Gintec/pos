@extends('pmaster')

@section('pcontent')
    
    <div class = "row">

        
        <form class="col s12" method="POST" action="{{route('returneds.store')}}">
            @csrf
            <div class = "col m6 offset-m3">
                
                    <h5>Return item: {{ $item->product->product_name }}  ({{$item->product->product_id}})</h5>
                    <h6>Invoice No: {{$item->invoice_no}}</h6>

                    <div class="row">
                        
                            <input type="hidden" value="{{$item->product_id}}" name="product_id">
                           
                            <input type="hidden" value="{{$item->invoice_no}}" name="invoice_no">
                            <input type="hidden" value="{{$item->id}}" name="item_id">
                            <input type="hidden" value="{{$item->amount}}" id="selling_price">
                            <input type="hidden" value="{{$item->quantity_sold}}" id="quantity_sold">

                        
                        <div class="input-field col s4">
                            <input type="number" class="validate" name="quantity_returned" id="quantity_returned" value="1" min="1" max="{{$item->quantity_sold}}">                              
                            <label for="quantity_returned">Quantity Returned</label>
                        </div>  
                        <div class="input-field col s4">
                            <input type="number" class="validate" id="amount_returned" name="amount_returned" min="1" value="{{$item->amount/$item->quantity_sold}}">                              
                            <label for="amount_returned">Amount Returned</label>
                        </div>
                        <div class="input-field col s4">
                                <select name="collected_by">   
                                    <option value="General" selected>General</option>
                                    @foreach ($personnels as $personnel)                                        
                                        <option value="{{$personnel->personnel_id}}">{{$personnel->personnel_firstname." ".$personnel->personnel_lastname}}</option>                                    
                                    @endforeach
                                </select>                           
                                <label>Collected By</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea name="return_reason" id="return_reason" class="materialize-textarea"> </textarea>                           
                            <label for="return_reason">Reasons for Returning this Item</label>
                        </div>
                                         
                          
                        <div class="row center">
                            <button type="submit" id="add_to-stock" class="waves-effect waves-light btn">Save</button>
                        </div>
                    </div>
            </div>
            

            

            </form>
        
    </div>

@endsection