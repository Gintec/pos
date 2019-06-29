@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:98%; margin:auto;">
        <h5 class="text-center">List of Products</h5>
    <form action="product_search" method="post">
        @csrf
        <div class="input-field col m6 offset-m2">
            <select name="keyword" id="keyword" class="browser-default" style="width: 100% !important;">
                    <option value="-" selected>Search All Prodducts Here</option>
                    @foreach ($all_products as $ap)                  
                    
                    <option value="{{$ap->product_id}}">{{$ap->product_name}} - {{$ap->model_name}} - {{$ap->product}} - {{$ap->made_year}}</option>                                                 
                    
                    @endforeach
            </select>
        </div>
        <div class="input-field col m1">
            <button type="submit" class="btn green"><i class="material-icons right">search</i></button>
        </div>
    </form>
        @if ($products!=NULL)
          <div>
              <a href="/add_product" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
          </div>
        <table id="products" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Selling Price</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Product</th>
                    <th>Part No</th>
                    <th>In Stock</th>
                    <th>Storage Location</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)                 
                
                <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_id}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->product_status}}</td>
                    <td>{{$product->product_category}}</td>
                    <td>{{$product->product_type}}</td>
                    <td>{{$product->model_name}}</td>
                    <td>{{$product->made_year}}</td>
                    <td>{{$product->product}}</td>
                    <td>{{$product->part_number}}</td>
                    <td>{{$product->stock->quantity_remaining}}</td>
                    <td>{{$product->product_location}}</td>
                    
                    <td>                    
                        <div class="fixed-action-btn horizontal direction-top direction-left click-to-toggle sales_action" style="position: relative !important; float: text-align: center; display: inline-block; bottom: 0px !important; padding: 0px !important">
                                <a class="btn-floating btn-small dark-purple waves-effect waves-light" style="display: inline-block" >
                                    <i class="small material-icons">menu</i>
                                </a>
                                <ul style="top: 0px !important">
                                    
                                    <li>
                                            <form method="POST" action="{{route('products.destroy',$product->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                                            </form>
                                    </li>
                          
                                    <li> 
                                            <a href="gen_barcode/{{$product->product_id}}/{{$product->stock->quantity_remaining}}" class="btn-floating btn-small waves-effect black waves-light tooltipped" data-position="top" data-tooltip="Generate Barcodes for this item"  target="_blank"><i class="material-icons" >view_week</i></a>
                                    </li>
                          
                                    <li>
                                            <a href="product/{{$product->product_id}}" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="View Product Details"  target="_blank"><i class="material-icons" >remove_red_eye</i></a>          
                                    </li>
                          
                                    <li>
                                            <a href="restock/{{$product->product_id}}" class="btn-floating btn-small waves-effect blue waves-light tooltipped" data-position="top" data-tooltip="Add to the Stock/Inventory" target="_blank"><i class="material-icons">refresh</i></a>         
                                    </li>

                                    <li>
                                            <a href="sales/{{$product->product_id}}" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="View Sales for this Product"  target="_blank"><i class="material-icons" >shopping_cart</i></a>
                                    </li>
                                </ul>
                        </div>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Selling Price</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Product</th>
                    <th>Part No</th>
                    <th>In Stock</th>
                    <th>Storage Location</th>
                    <th>Actions</th>
                  
                </tr>
            </tfoot>
        </table>
        <div class="col m6 offset-m3">{{$products->links()}}</div>
        @else
            <blockquote>No Products found in the database.</blockquote>
        @endif

    </div>
@endsection