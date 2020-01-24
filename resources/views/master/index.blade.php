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
        
        
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/bootstrap-grid.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/bootstrap-reboot.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatables.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/buttons.bootstrap4.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/dataTables.bootstrap4.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/fixedHeader.bootstrap4.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/jquery.dataTables.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/responsive.bootstrap4.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/searchPanes.bootstrap4.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/vendor/datatable/select.bootstrap4.min') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        @yield('css')

        <link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('img/icons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('img/icons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('img/icons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('img/icons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('img/icons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('img/icons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('img/icons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('img/icons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('img/icons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ URL::asset('img/icons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('img/icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('img/icons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('img/icons/favicon-16x16.png') }}">

        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <meta property="og:title"              content="Lins Saver Patrol" />
        <meta property="og:description"        content="Customer Information System" />
        <meta property="og:image"              content="" />
        
    </head>
    <body>
         
          
        @yield('content')
        
        <script src="{{ URL::asset('js/vendor/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/popper.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/buttons.bootstrap4.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/buttons.colVis.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/buttons.print.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/dataTables.bootstrap4.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/dataTables.buttons.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/dataTables.fixedHeader.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/dataTables.responsive.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/dataTables.searchPanes.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/dataTables.select.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/fixedHeader.bootstrap4.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/jquery.dataTables.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/pdfmake.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/responsive.bootstrap4.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/searchPanes.bootstrap4.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/select.bootstrap4.min') }}"></script>
        <script src="{{ URL::asset('js/vendor/datatable/vfs_fonts') }}"></script>
            
        @yield('js')
    </body>
</html>