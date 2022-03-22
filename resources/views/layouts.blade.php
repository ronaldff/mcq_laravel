<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>@yield('title')</title>
    <link href="{{ asset('front_assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('front_assets/css/bootstrap.css') }}" rel="stylesheet">   
    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet"> 
  </head>
    <body>
        <div class="container">
          @section('content')
          @show
        </div>

        <script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('front_assets/js/bootstrap.js') }}"></script>  
    </body>
</html>