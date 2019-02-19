<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">

    <title>Garden of eden</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
  {{--  <link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap-theme.min.css') }}"/>--}}
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Slick -->
    {{--<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>--}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('vendor/themify/themify-icons.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom stylesheet -->
    @yield('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/custom.css') }}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{--<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}
</head>
<body>
<!-- HEADER -->
@include('partials.header')
<!-- /HEADER -->

<!-- NAVIGATION -->
@include('partials.nav')
<!-- /NAVIGATION -->

<!-- SECTION -->
@yield('content')
<!-- FOOTER -->
@include('partials.footer')
<!-- /FOOTER -->

{{--<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>--}}
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--<script src="{{ asset('js/slick.min.js') }}"></script>--}}
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
</body>
</html>
