<!doctype html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Dariusz Swoszowski">
    <meta name="description" content="Create your own blog website with Blog Builder.">
    <link type="text/css" rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>{{ config('app.name', 'BlogBuilder') }}</title>
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: '#body'
    });
    </script>
  </head>
  <body>
    @include('inc.navbar')
    <div class="container">
      @include('inc.messages')
      @yield('content')
    </div>

    <script src="{{asset('/js/app.js')}}"></script>
  </body>
</html>