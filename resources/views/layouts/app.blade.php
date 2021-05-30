<!doctype html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link type="text/css" rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>{{ config('app.name', 'Blog Builder') }}</title>
  
  </head>
  <body>
    @include('inc.navbar');
    <div class="container">
  @yield('content')
    </div>
  </body>
</html>