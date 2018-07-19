<!doctype html>
<html lang="en">

<head>
    <title>CaMi|Shop-@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metisMenu/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/parsleyjs/css/parsley.css') }}">


    <link rel="stylesheet" type="text/css"
          href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweetalert/sweetalert.css') }}"/>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>


    <!-- Javascript -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/metisMenu/metisMenu.js') }}"></script>
    <script src="{{ asset('vendor/parsleyjs/js/parsley.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box">
                <div class="content">
                    @if(Session::has('message'))
                        <div class="alert alert-danger alert-dismissable flat">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            <p>
                                <i class="fa fa-warning"></i>
                                {{ Session::get('message') }}
                            </p>
                        </div>
                    @endif

                    <div class="header">
                        <div class="logo text-center">
                            <img src="{{ asset('img/GARDEN_LOGO.png') }}" alt="DiffDash" style="height: 80px">
                        </div>
                        <p class="lead">Login to your account</p>
                    </div>
                    <form class="form-auth-small" action="{{ route('post.login') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email')?'has-error':''}}">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input value="{{Request::old('email')}}" type="email" name="email" class="form-control" id="signin-email" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password')?'has-error':''}}">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" name="password" class="form-control" id="signin-password"
                                   placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                        <div class="bottom">
                            <span class="helper-text">
                                <i class="fa fa-lock"></i> <a href="">Forgot password?</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
<!-- /.login-box -->
</body>
</html>
