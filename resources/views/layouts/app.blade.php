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
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,600&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
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
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
@if(\App\Event::where('active',true)->count()>0)
    <div>
        @foreach(\App\Event::all() as $event)
            <div class="alert alert-info alert-dismissible flat" role="alert" style="margin-bottom: 0!important;background-color: #0067B8;color: white!important;border-color: #0067B8!important;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"  style="color: white!important;">
                    <span aria-hidden="true" style="color: white!important;">
                        &times;
                    </span>
                </button>
                <p class="container" style="font-weight: lighter !important;">
                    {{ $event->description }}
                    <span>This will start on </span><strong>{{ date('D j M Y', strtotime($event->date))  }}</strong>
                </p>
            </div>
        @endforeach
    </div>
@endif

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
