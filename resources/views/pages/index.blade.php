<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Dariusz Swoszowski">
    <meta name="description" content="Create your own blog website with Blog Builder.">
    <title>Blog Builder</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: '#body'
    });
    </script>
</head>
<body class="body">
  @include('inc.navbar')
  <div class="container-2 col-12 col-md-6">
    <h1 class="display-4">{{$title}}</h1>
    <a href="/login" class="btn btn-outline-info">Login</a>
    <a href="/register" class="btn btn-outline-info">Register</a>
    <a href="https://www.swoszowski.co.uk/blogbuilder/blogs/4" class="btn btn-outline-danger">Example</a>
    </div>

        <script src="{{ asset('js/app.js') }}"></script>
        
</body>
</html>