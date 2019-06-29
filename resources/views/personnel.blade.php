@extends('pmaster')

@section('pcontent')
    
    <div class = "row" style="width:90%; margin:auto;">
        <h5 class="text-center">Staff List</h5>
        @if ($personnels!=NULL)
          <div>
              <a href="/add_personnel" class="btn btn-small btn-floating right pulse"><i class="material-icons">add</i></a>
          </div>
        <table id="example" class="display responsive-table" style="width:100%;;">
            <thead class="thead-dark">
                <tr>
                    <th>Staff Name</th>
                    <th>Staff ID</th>
                    <th>Staff Phone No</th>
                    <th>Department</th>
                    <th>Basic Salary</th>
                    <th>Actions</th>                    
                </tr>
            </thead>
            <tbody>
                @foreach ($personnels as $personnel)

                  
                
                <tr>
                    <td>{{$personnel->personnel_firstname}} {{$personnel->personnel_lastname}}</td>
                    <td>{{$personnel->personnel_id}}</td>
                    <td>{{$personnel->personnel_phoneno}}</td>
                    <td>{{$personnel->personnel_department}}</td>
                    <td>{{$personnel->personnel_salary}}</td>
                    
                    <td style="position: relative;">
                        <div class="fixed-action-btn horizontal direction-top direction-left click-to-toggle sales_action" style="position: relative !important; float: text-align: center; display: inline-block; bottom: 0px !important; padding: 0px !important">
                                <a class="btn-floating btn-small dark-purple waves-effect waves-light" style="display: inline-block" >
                                    <i class="small material-icons">menu</i>
                                </a>
                                <ul style="top: 0px !important">
                                    
                                    <li>
                                            <form method="POST" action="{{route('personnels.destroy',$personnel->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            <button onclick="return confirm('Are you sure you want to delete this record?')" class="btn-floating btn-small waves-effect red waves-light tooltipped" data-position="top" data-tooltip="Delete this Item"><i class="material-icons">delete</i></button>
                                            </form>
                                    </li>
                            
                                    <li>
                                            <a href="view_personnel/{{$personnel->personnel_id}}" class="btn-floating btn-small waves-effect green waves-light tooltipped" data-position="top" data-tooltip="View staff info"><i class="material-icons">remove_red_eye</i></a>          
                                    </li>
                                    <li>
                                            <a href="pay_salary/{{$personnel->personnel_id}}" class="btn-floating btn-small waves-effect purple waves-light tooltipped" data-position="top" data-tooltip="Pay Salary"><i class="material-icons">money</i></a>          
                                    </li>
                                </ul>
                        </div>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Staff Name</th>
                    <th>Staff ID</th>
                    <th>Staff Phone No</th>
                    <th>Department</th>
                    <th>Basic Salary</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        
        @else
            <blockquote>No Products found in the database.</blockquote>
        @endif

    </div>
@endsection