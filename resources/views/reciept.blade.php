<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <style>
        tr, td{
            padding: 0px !important;
            margin; 0px !important;
            font-size: 0.8em !important;            
        }
        table{
            margin-left: 10px;
        }
    </style>
    <title>PAYMENT RECEIPT</title>
</head>
<body style="width: 85%"  onload="window.print()">
    <table class="table stripped">
        <thead>
            
            <tr style="text-align: center;">
                <th colspan="4" style="text-align: center">
                    <!--<img src="/uploads/logo.jpg" heigh="40" width="auto" style="margin-bottom: 0px;">-->
                    <h6 style="font-weight: bold;">{{$company->company_name}}<br>
                    <span><small><em>{{$company->motto}}</em></small></span></h6>
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4" style="text-align: center; font-size: 0.7em;" class="small">                    
                    {{$company->company_services}}<br>
                    {{$company->company_address}}<br>
                    {{$company->company_tel}}<br>
                </td>               
            </tr>
            <tr>
                <td colspan="4" class="row">
                    
                    <div class="text-center col s4 offset-s4" style="border: double 1px #000; text-align: center !important;">RECEIPT</div>
                </td>                
            </tr>
            <tr>
                <td colspan="4" class="text-center col s4 offset-s4" style="text-align: center !important;">
                    Reciept NO: {{$invoice->invoice_no}}
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
            <tr style="text-align: left; font-size: 0.5em !important;">
                <th style="width: 50% !important;">DESC.</th>
                <th>RATE</th>
                <th>QTY.</th>
                <th style="text-align: right;">COST</th>
            </tr>
                

                @foreach ($sales as $item)
                    <tr style="border-bottom: solid 1px grey;">
                        <td><small>{{$item->product->product_name}} - {{$item->product->model_name}} - {{$item->product->made_year}} - {{$item->product->product}}</td>
                        <td>{{$item->selling_price}}</small></td>
                        <td style="text-align: center;">{{$item->quantity_sold}}</td>
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
                    <td colspan="2">
                        Discount
                    </td>
                    <td colspan="2" style="font-weight: bold; text-align: right">
                        {{$invoice->total_discount}}
                    </td>
                </tr>

                <tr>
                    <td colspan="4">{{$total_due}}</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <em>Goods recieved in good condition</em>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <em>Sales Person:</em> {{$name}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="right">
                        __________________ <br><br>
                        Managers Signature
                    </td>
                </tr>
                <tr>
                    <td>Thanks for your patronage!</td>
                </tr>
        </tbody>
    </table>
</body>
</html>