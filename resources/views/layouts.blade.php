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

    <link rel="stylesheet" type="text/css" href="{{ asset('slick_2/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick_2/slick/slick-theme.css') }}"/>

    <link href="{{ asset('front_assets/css/style.css') }}" rel="stylesheet"> 
  </head>
    <body>
     

        <script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('front_assets/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('slick_2/slick/slick.min.js') }}"></script>
        <div class="container">
          @section('content')
          @show
        </div>
      
    </body>
</html>