<!doctype html>
<html lang="en">

<head>
    <title>CaMi|Shop-@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    {{--<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metisMenu/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/parsleyjs/css/parsley.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweetalert/sweetalert.css') }}"/>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <!-- jQuery Plugins -->
{{--<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}
<!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
{{--<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>--}}
<!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>


    <!-- Javascript -->
    <script src="{{ asset('vendor/metisMenu/metisMenu.js') }}"></script>
    <script src="{{ asset('vendor/parsleyjs/js/parsley.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>

<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    @include('shared.header')
    <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
    @include('shared.left')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN CONTENT -->
    <div id="main-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
<div class="clearfix"></div>
<footer>
    <p class="copyright">&copy; {{ date('Y') }}
        <a href="" target="_blank">
            <b>jean paul CaMi Byiringiro</b>
        </a>. All Rights Reserved.
    </p>
</footer>



</body>
</html>
