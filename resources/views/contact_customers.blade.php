@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">

            <form class="col col m8 offset-m2 card" method="POST" action="{{route('send_message')}}">
                    @csrf
                   
                    <div class = "col m12">
                        
                            <h5>CONTACT CUSTOMERS 
                                @if (isset($_GET['customer_id']))
                                    {{ $_GET['customer_id'] }})
                                    
                                    <input type="hidden" value="{{$_GET['customer_id'] }}" name="customer_id">
                                  
                                @endif
                                </h5>
        
                            <div class="row">

                                <div class="input-field col s12">
                                    <input type="text" class="validate" name="recipients" id="recipients">                              
                                    <label>Recipient(s)</label>
                                </div>
                                
                                <div class="input-field col s12">
                                    <textarea name="message" id="message" class="materialize-textarea" data-length="500"> </textarea>                           
                                    <label for="message">Mesage</label>
                                </div>
        
                                  
                                <div class="row center">
                                    <button type="submit" id="add_to-stock" class="waves-effect waves-light btn"> <i class="material-icons">send</i> Send</button>
                                </div>
                            </div>
                        </div>
                    
        
                    
        
                </form>

        <h5 class="text-center" style="clear:both;">Customers Contact List</h5>
        @if ($customers!=NULL)
          <div>
              <a href="/add_customer" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
          </div>
        <table id="example" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>
                        <div>
                            <input type="checkbox" class="filled-in" id="select_all" onclick="addnumber('select_all')" value="{{$all_numbers}}"/>
                            <label for="select_all">Select All</label>
                        </div>
                    </th>
                    <th>Contact Name</th>
                    <th>Customer ID</th>
                    <th>Customer Company</th>
                    <th>Phone Num.</th>
                    <th>Group</th>
                    <th>Category</th>
                                       
                </tr>
            </thead>
            <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ($customers as $customer)

                  
                
                <tr>
                    <td>
                        <div>
                            <input type="checkbox" class="filled-in"  name="number[]" onclick="addnumber({{$i}})" id="{{$i}}" value="{{$customer->customer_phoneno}}"/>
                            <label for="{{$i}}">+</label>
                        </div>
                    </td>
                    <td>{{$customer->customer_name}}</td>
                    <td>{{$customer->customer_id}}</td>
                    <td>{{$customer->customer_company}}</td>
                    <td>{{$customer->customer_phoneno}}</td>
                    <td>{{$customer->customer_group}}</td>
                    <td>{{$customer->customer_category}}</td>
                   
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                        <th>Select</th>
                        <th>Contact Name</th>
                        <th>Customer ID</th>
                        <th>Customer Company</th>
                        <th>Phone Num.</th>
                        <th>Group</th>
                        <th>Category Location</th>
                        
                </tr>
            </tfoot>
        </table>
        
        @else
            <blockquote>No Products found in the database.</blockquote>
        @endif

    </div>
@endsection