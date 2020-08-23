<html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
    
        <title>LOGIN</title>
        <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/css/style.css')}}">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
        {{-- <link rel="stylesheet" href="/css/app.css" > --}}
    </head>
    <body>
     
     <div class = "container">
         <hr>
    {{-- @include('menu') --}}
     @yield('content')
     </div>
    </body>
</html>