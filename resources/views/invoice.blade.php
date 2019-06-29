<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <style>
        tr, td{
            margin; 0px !important;          
        }
        table{
            margin: auto;
            width: 80%;
        }
        tbody:before, tbody:after { display: none; }
    </style>
    <title>INVOICE</title>
</head>
<body>
    
    <table class="table table-stripped">        
            <tr style="text-align: center;">
                <td colspan="4" style="text-align: center">
                    
                    <h3 style="font-weight: bold;"><img src="uploads/logo.jpg" heigh="100" width="auto" style="margin-bottom: 0px;"><br>{{$company->company_name}}<br>
                    <span><small><em>{{$company->motto}}</em></small></span></h3>
                    <img src="uploads/logo2.jpg" heigh="100" width="auto" style="margin-bottom: 0px;">
                </td>                
            </tr>
            <tr>
                <td colspan="4"  style="text-align: center; font-size: 0.7em;" class="small">                    
                    {{$company->company_services}}<br>
                    Address: {{$company->company_address}}<br>
                    Tel: {{$company->company_tel}}<br>
                </td>               
            </tr>
            <tr>
                <td colspan="4" class="row">                    
                    <div class="text-center col-md-4 col-md-offset-4" style="width: 200px; margin: auto; border: double 1px #000; text-align: center !important;">SALES INVOICE</div>
                </td>                
            </tr>
            <tr>
                    <td colspan="2" class="text-center col s4 offset-s4" style="text-align: center !important;">
                        Invoice No: {{strtoupper($invoice->invoice_no)}}
                    </td>   
                    <td colspan="2" class="text-center col s4 offset-s4" style="text-align: center !important;">
                        Payment Status: {{$invoice->payment_status}}
                    </td>             
                </tr>
            <tr>
                <td colspan="2">                    
                    Customer Name: {{$customer->customer_name}}<br>
                    {{$customer->customer_phoneno}}
                </td>
                <td colspan="2">
                    Date: {{$invoice->invoice_date}}
                </td>                
            </tr>
    </table>
    <hr>
    <table class="table table-stripped" border="1" cellspacing="0" cellpadding="4">
            <tr style="text-align: left; font-weight: bold;">
                <td>DESC.</td>
                <td>RATE</td>
                <td>QTY.</td>
                <td style="text-align: right;">COST</td>
            </tr>
            
                @foreach ($sales as $item)
                    <tr style="border-bottom: solid 1px grey;">
                        <td>{{$item->product->product_name}} - {{$item->product->model_name}} - {{$item->product->made_year}} - {{$item->product->product}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>{{$item->quantity_sold}}</td>
                        <td style="text-align: right;">{{$item->amount}}</td>
                    </tr>
                @endforeach
    
                <tr class="h3">
                    <td align="right" colspan="2">
                        TOTAL
                    </td>
                    <td colspan="2" style="font-weight: bold; text-align: right">
                        {{$invoice->total_amount}}
                    </td>
                </tr>
                <tr class="h3">
                    <td colspan="2" align="right">
                        Discount
                    </td>
                    <td colspan="2" style="font-weight: bold; text-align: right">
                        {{$invoice->total_discount}}
                    </td>
                </tr>
                
                <tr class="h3">
                    <td colspan="2" align="right">
                        Amount Paid: 
                    </td>
                    <td colspan="2" style="font-weight: bold; text-align: right">
                            {{$invoice->total_amount - $invoice->balance}}
                    </td>
                </tr>
                <tr class="h3">
                    <td colspan="2" align="right">
                            Balance/Total Due:
                    </td>
                    <td colspan="2" style="font-weight: bold; text-align: right">
                         {{$invoice->balance}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">IN WORDS: {{$total_due}}</td>
                </tr>
                <tr>
                    <td colspan="4">BANKERS: <br>{{$company->company_account_name}}, {{$company->company_account_no}}, {{$company->company_account_bank}}</td>
                </tr>
    </table>
    <table>
                <tr>
                    <td colspan="4">
                        <em>Goods recieved in good condition</em>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><br><br><br><br>__________________ <br>
                        Customer Signature</td>
                    <td colspan="2" align="right">
                        <br><br><br><br>__________________ <br>
                        Managers Signature
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;">Thanks for your patronage!</td>
                </tr>
               
        
    </table>
</body>
</html>