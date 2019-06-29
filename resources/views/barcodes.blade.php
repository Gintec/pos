<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/materialize.min.css"> 
    <style>
        .barcode{
            width: 95% !important;
            
            margin: auto;
            text-align: center !important; 
        }

        body{
            width: 100% !important;
        }
    </style>

    <title>PRINT BARCODES FOR {{$product->product_name}}</title>
</head>
<body onload="window.print()">
    
    
        @for ($i = 1; $i <=$quantity; $i++)
            <div class="barcode">               
                    
                    <p> <span>{{$product->product_name}}</span>                    
                        <img src="{{$code}}" width="100%"><br><small><em>{{$product_id}} - {{$product->model_name}} - {{$product->made_year}} - {{$product->product}}</em></small>
                    </p>
                
            </div>
        @endfor
    
</body>
</html>