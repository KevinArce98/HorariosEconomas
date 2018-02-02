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
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center justify-content-center">
         <form id="login-form" role="form" method="POST" action="{{ route('login') }}" class="text-center">
          <img class="imglogo"src="{{ asset('img/Logo-EconoMas.png') }}" alt="logoCompany" width="350px" height="165px">
          <h2 class="h2font">Ingresar</h2>
          <hr>
            {!! csrf_field() !!}
              <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="login-username" type="text" name="username" required="" placeholder="[Usuario]" class="form-control">
                <label class="h2font" for="login-username">Usuario</label>
                 @if ($errors->has('username'))
                 <br>
                      <span class="help-block text-danger">
                          <strong>{{ $errors->first('username') }}</strong>
                      </span>
                  @endif
              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="login-password" type="password" name="password" required="" placeholder="[Contraseña]" class="form-control">
                <label class="h2font" for="login-password" >Contraseña</label>
                @if ($errors->has('password'))
                <br>
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <button id="btnSignIn" type="submit" class="btn btn-success">Ingresar</button>
          </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
  </body>
</html>