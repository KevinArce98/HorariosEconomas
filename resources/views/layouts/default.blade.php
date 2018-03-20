<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header"><a href="{{ route('home')}}" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">PORRAS</strong><strong>UGALDE</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">P</strong><strong>U</strong></div></a>
            <button class="sidebar-toggle"><i class="fa fa-bars"></i></button>
          </div>
          <ul class="right-menu list-inline no-margin-bottom">    
            <li class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="fa fa-envelope-o fa-1x"></i><span class="badge dashbg-1">1</span></a>
              <ul aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages">
                <li><a href="#" class="dropdown-item message d-flex align-items-center">
                    <div class="profile"><img src="../../img/avatar-5.jpg" alt="..." class="img-fluid">
                      <div class="status offline"></div>
                    </div>
                    <div class="content">   <strong class="d-block">Sara Wood</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div></a></li>
                <li><a href="#" class="dropdown-item text-center message"> <strong>See All Messages <i class="fa fa-angle-right"></i></strong></a></li>
              </ul>
            </li>
            <li class="list-inline-item logout">                   
             
              <a id="logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout <i class="fa fa-sign-out"></i></a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      </nav>
</header>
<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div id="left-media" class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="../../img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{ auth()->user()->username }}</h1>
            <p>Diseñador Web</p>
          </div>
        </div>

        <!-- Sidebar Navidation Menus-->
        <ul class="list-unstyled">
                <li class="{{ (strpos(\Request::route()->getName(), 'home') !== false ) ? 'active' : '' }}"><a href="{{ route('home') }}"> <i class="icon-home"></i>Principal </a></li>
                <li class="{{ (strpos(\Request::route()->getName(), 'Schedule') !== false ) ? 'active' : '' }}"><a href="#"> <i class="fa fa-calendar"></i>Horarios </a></li>
                <li class="{{ (strpos(\Request::route()->getName(), 'market') !== false ) ? 'active' : '' }}"><a href="{{ route('markets.index') }}"> <i class="fa fa-shopping-cart"></i>Puntos de Venta </a></li>
                <li class="{{ (strpos(\Request::route()->getName(), 'position') !== false ) ? 'active' : '' }}"><a href="{{ route('roles.index') }}"> <i class="fa fa-id-card"></i>Puestos </a></li>
                <li class="{{ (strpos(\Request::route()->getName(), 'users') !== false ) ? 'active' : '' }}"><a href="#"> <i class="fa fa-users"></i>Usuarios </a></li>
                <li class="{{ (strpos(\Request::route()->getName(), 'roles') !== false ) ? 'active' : '' }}"><a href="{{ route('roles.index') }}"> <i class="fa fa-list"></i>Roles </a></li>
        </ul>
      </nav>
      <div class="page-content">
       @yield('content')
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom">{{Carbon\Carbon::now()->year}} &copy; ECONOMás. Diseñado por <a href="https://jakadesign.com">JAKADesign</a>.</p>
            </div>
          </div>
        </footer>
     </div>
   </div>
    <!-- JavaScript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
  </body>
</html>