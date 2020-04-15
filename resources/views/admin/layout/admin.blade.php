<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8" />
    <title>Bulk Buyers Connect - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/login.css')}}" rel="stylesheet" type="text/css" />

</head>

    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="{{url('/')}}"><i class="fa fa-home h2 text-dark"></i></a>
        </div>

        @yield('content')

        <script src="{{asset('admin/js/vendor.min.js')}}"></script>
        <script src="{{asset('admin/js/app.min.js')}}"></script>

    </body>
</html>
