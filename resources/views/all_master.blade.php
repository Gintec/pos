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
          <ul class="right hide">
            <li><a href="#" target="_blank">Sass</a></li>
            <li><a href="#" target="_blank">Components</a></li>
            <li><a href="#" target="_blank">Javascript</a></li>
            <li><a href="h#" target="_blank">Mobile</a></li>
          </ul>
          
          <ul class="side-nav grey darken-2" id="mobile-demo">
            
            
            <li class="sidenav-header blue">
              <div class="row">
                <div class="col s4">
                    <img src="#" width="48px" height="48px" alt="" class="circle responsive-img valign profile-image">
                </div>
               
              </div>
            </li>
            
            
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
      @yield('content')
    
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