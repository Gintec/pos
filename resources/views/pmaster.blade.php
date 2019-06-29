<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{asset('/css/materialize.min.css')}}">    
    <link rel="stylesheet" href="{{asset('/css/material-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/css/animate.min.css')}}">    
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dataTables.material.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/pmain.scss')}}">
    <style>
      body{
        font-family: 'Roboto', sans-serif;
      }
        div.grey:hover{
          background-color: #13A39A !important;
          color: #ffffff !important;
          transition-delay: 10ms !important;       
      }
    </style>
    <title>POS</title>
</head>
<body>
<nav>
        <div class="nav-wrapper">
          <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
          <a href="#" class="brand-logo" target="_blank">| POS</a>
          <a href="/logout" class="btn btn-small btn-floating tooltipped" data-position="top" data-tooltip="Logout" style="float: right !important; margin:5px;"><i class="material-icons" style="margin-top:-10px;">exit_to_app</i>Logout</a>
          <ul class="right hide">
            <li><a href="/" target="_blank">Dashboard</a></li>
            <li><a href="/add_sales" target="_blank">New Sales</a></li>
            <li><a href="/customers" target="_blank">Customers</a></li>
            <li><a href="/suppliers" target="_blank">Suppliers</a></li>
          </ul>
          
          <ul class="side-nav grey darken-2" id="mobile-demo">
            
            
            <li class="sidenav-header blue">
              <div class="row">
                <div class="col s4">
                    <img src="#" width="48px" height="48px" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col s8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text" href="/profile" data-activates="profile-dropdown">@auth
                        {{auth()->user()->name}}
                    @endauth<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="/profile"><i class="material-icons">person</i></a></li>
                        <li><a href="/company"><i class="material-icons">settings</i></a></li>
                        <li><a href="/help"><i class="material-icons">help</i></a></li>
                        <li class="divider"></li>
                        <li><a href="/lock"><i class="material-icons">lock</i></a></li>
                        <li><a href="/logout"><i class="material-icons">exit_to_app</i></a></li>
                    </ul>
                </div>
              </div>
            </li>
            
            <li class="blue">
              <ul class="collapsible collapsible-accordion">
                  <li>
                    <a class="collapsible-header waves-effect waves-blue"><i class="material-icons white-text ">shopping_cart</i>Sales<i class="material-icons right white-text" style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body z-depth-3">
                      <ul>
                        <li><a class="waves-effect waves-blue" href="/add_sales"><i class="material-icons">shopping</i>New Sales</a></li>
                        <li><a class="waves-effect waves-blue" href="/all_sales"><i class="material-icons">storage</i>Sales Report</a></li>
                        
                        <li><div class="divider"></div></li>
                      </ul>
                    </div>
                  </li>
              </ul>
            </li>
            
            
            
            <li class="white">
              <ul class="collapsible collapsible-accordion">
                <li>
                  <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">view_list</i>Products <i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a class="waves-effect waves-blue" href="/add_product"><i class="material-icons">playlist_add</i>Add New Product</a></li>
                      <li><a class="waves-effect waves-blue" href="/products"><i class="material-icons">list</i>Products List</a></li>
                      <li><div class="divider"></div></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </li>
            <li class="white">
              <ul class="collapsible collapsible-accordion">
                <li>
                  <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">inventory</i>Inventory<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a class="waves-effect waves-blue" href="/inventory"><i class="material-icons">storage</i>Inventory</a></li>
                      <li><a class="waves-effect waves-blue" href="/returneds"><i class="material-icons">low_priority</i>Returned Items</a></li>
                      <li><div class="divider"></div></li>
                    </ul>
                  </div>
                </li>
              </ul>
            </li>

           

            <li class="white">
                  <ul class="collapsible collapsible-accordion">
                    <li>
                      <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">people</i>Customers<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                      <div class="collapsible-body">
                        <ul>
                          <li><a class="waves-effect waves-blue" href="/add_customer"><i class="material-icons">person_add</i>Add New</a></li>
                          <li><a class="waves-effect waves-blue" href="/customers"><i class="material-icons">people</i>Customers List</a></li>
                          <li><div class="divider"></div></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
            </li>
            <li class="white">
                <ul class="collapsible collapsible-accordion">
                  <li>
                    <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">local_shipping</i>Suppliers<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a class="waves-effect waves-blue" href="/add_supplier"><i class="material-icons">playlist_add</i>Add New</a></li>
                        <li><a class="waves-effect waves-blue" href="/suppliers"><i class="material-icons">line_style</i>Supplier List</a></li>
                        <li><div class="divider"></div></li>
                      </ul>
                    </div>
                  </li>
                </ul>
          </li>
          <li class="white">
              <ul class="collapsible collapsible-accordion">
                <li>
                  <a class="collapsible-header waves-effect waves-blue"><i class="material-icons">people_outline</i>Personnel<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                  <div class="collapsible-body">
                    <ul>
                      <li><a class="waves-effect waves-blue" href="/add_personnel"><i class="material-icons">person_add</i>Add New</a></li>
                      <li><a class="waves-effect waves-blue" href="/personnels"><i class="material-icons">people</i>Staff List</a></li>
                      <li><a class="waves-effect waves-blue" href="/users"><i class="material-icons">verified_user</i>Manage Users</a></li>
                      <li><div class="divider"></div></li>
                    </ul>
                  </div>
                </li>
              </ul>
        </li>

            <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">money_off</i>Debtors</a></li>
            <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">assessment</i></i>Reports</a></li>
            <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">alarm_on</i>Activites</a></li>
            <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">contact_phone</i>Communication</a></li>
            <li class="white"><div class="divider"></div></li>
            <li class="white"><a href="#" class="waves-effect waves-blue"><i class="material-icons">mail</i>Messages<span class="new badge right yellow darken-3"></span></a></li>
            
            <li class="sidenav-footer grey darken-2">
              <div class="row">  
                <div class="social-icons">
                  <div class="col s2">
                    <a href="#"><i class="fa fa-lg fa-linkedin-square"></a></i>
                  </div>
                  <div class="col s2">
                    <a href="#"><i class="fa fa-lg fa-facebook-official"></a></i>
                  </div>
                  <div class="col s2">
                    <a href="#"><i class="fa fa-lg fa-twitter"></a></i>
                  </div>
                  <div class="col s2">
                    <a href="#"><i class="fa fa-lg fa-google-plus"></a></i>
                  </div>
                  <div class="col s2">
                    <a href="#"><i class="fa fa-lg fa-pinterest"></a></i>
                  </div>
                  <div class="col s2">
                    <a href="#"><i class="fa fa-lg fa-youtube"></a></i>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          
        </div>
      </nav>
      @include('/alerts')
      @yield('pcontent')
    
    <!-- Gitter Chat Link 
    <div class="fixed-action-btn"><a class="btn-floating btn-large red" href="/add_sales" title="New Sales"><i class="large material-icons">shopping_cart</i></a></div>
   -->

   <div class="fixed-action-btn click-to-toggle" style="bottom: 45px; right: 24px;">
      <a class="btn-floating btn-large pink waves-effect waves-light">
          <i class="large material-icons">apps</i>
      </a>

      <ul>
          <li>
              <a class="btn-floating tooltipped" data-position="top" data-tooltip="View Product Stock" href="/products" target="_blank"><i class="material-icons" title>storage</i></a>
              </li>
          <li>
          <a class="btn-floating red tooltipped" data-position="top" data-tooltip="View Sales Report" href="/view_sales"><i class="material-icons">show_chart</i></a>
          </li>

          <li> 
          <a class="btn-floating purple darken-1 tooltipped" data-position="top" data-tooltip="Our Suppliers" href="/suppliers"><i class="material-icons">local_shipping
            </i></a>
          </li>

          <li>
          <a class="btn-floating green tooltipped" data-position="top" data-tooltip="Our Customers" href="/customers"><i class="material-icons">people</i></a>          
          </li>

          <li>
          <a class="btn-floating blue btn-large tooltipped" data-position="top" data-tooltip="Add New Sales" href="/add_sales"><i class="material-icons">shopping_cart</i></a>          
          </li>
      </ul>
      </div>
    <script src="{{asset('/js/jquery.js')}}"></script>
    <script src="{{asset('/js/materialize.js')}}"></script>
    <!--<script src="/js/material2.min.css"></script>-->
    <script src="{{asset('/js/pmain.js')}}"></script>
    <script src="{{asset('/js/select2.min.js')}}"></script>
    <script src="{{asset('/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/js/select2.min.js')}}"></script>
</body>
</html>