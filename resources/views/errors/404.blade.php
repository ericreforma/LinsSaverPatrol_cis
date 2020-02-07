<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Lins Saver Patrol | Customer Information System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>
    <body>
        <div class="page-404">
            <img src="{{ asset('/img/logo_big.jpg') }}" />
            <h1>Saver Patrol</h1>
            <h3>Customer Information System</h3>
            <h4>404</h4>
            <p>The page you are looking for isn't available.</p>
            <a href="{{route('customer_list')}}">Return to home page</a>
        </div>
    </body>
</html>
