<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Bulk Buyers Connect - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
{{--    <meta http-equiv="refresh" content="5; {{ route('get.login') }}" />--}}
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">

    <link href="{{asset('admin/css/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/main.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('admin/css/sweetalert2.min.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('admin/libs/morris-js/morris.css')}}" />
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>
<header id="topnav">

    @include('admin.partials.toplink')

    @include('admin.partials.adminnav')

</header>

@yield('bulk')

@include('admin.partials.footer')

@yield('footer')

@yield('scripts')

</body>
</html>
