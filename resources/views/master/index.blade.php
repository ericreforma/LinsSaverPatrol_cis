<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Lins Saver Patrol | Customer Information System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">
        
        
        <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap-grid.min.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('/css/vendor/bootstrap-reboot.min.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/fixedHeader.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/searchPanes.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/datatable/select.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/vendor/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        @yield('css')

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/icons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/icons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/icons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/icons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/icons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png') }}">

        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <meta property="og:title"              content="Lins Saver Patrol" />
        <meta property="og:description"        content="Customer Information System" />
        <meta property="og:image"              content="" />
        
    </head>
    <body>
        @guest
            @yield('auth')
        @else
            @yield('content')
        @endguest
        
        <script src="{{ asset('/js/vendor/jquery.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/popper.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatables.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/buttons.print.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/searchPanes.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/dataTables.searchPanes.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/dataTables.select.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/fixedHeader.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/pdfmake.min.js') }}"></script>
       
        <script src="{{ asset('/js/vendor/datatable/select.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/js/vendor/datatable/vfs_fonts.js') }}"></script>
        <script src="{{ asset('/js/vendor/fontawesome.min.js') }}"></script>
        
        @yield('js')
    </body>
</html>