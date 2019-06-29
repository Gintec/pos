@extends('pmaster')

@section('pcontent')
    
    <div class = "row">

        <form class="col s12" method="POST" action="{{route('debts.update', $debt->id)}}">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class = "col m6 offset-m3">
                
                    <h5>PAY DEBT FOR INVOICE NO: {{ $debt->invoice_no }})</h5>

                    <div class="row">
                        
                            <input type="hidden" value="{{$debt->invoice_no}}" name="invoice_no">
                            <input type="hidden" value="{{$debt->id}}" name="id">
                            <input type="hidden" value="{{$debt->debt_amount}}" name="debt_amount">
                          
                        

                        <div class="input-field col s3">
                            <input type="number" class="validate" name="pay_amount" value="{{$debt->debt_amount}}" min="1">                              
                            <label for="pay_amount">Pay Amount</label>
                        </div>
                        
                        <div class="input-field col s9">
                            <textarea name="remarks" id="remarks" class="materialize-textarea"> </textarea>                           
                            <label for="remarks">Make Remarks</label>
                        </div>

                          
                        <div class="row center">
                            <button type="submit" id="add_to-stock" class="waves-effect waves-light btn">Pay Debt</button>
                        </div>
                    </div>
                </div>
            

            

        </form>
        
    </div>

@endsection