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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">

    <link href="{{asset('admin/css/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/main.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

@yield('bulk')

@include('admin.partials.footer')

@yield('footer')

<script src="{{asset('admin/js/vendor.min.js')}}"></script>
<script src="{{asset('admin/js/app.min.js')}}"></script>

@yield('scripts')

</body>
</html>
