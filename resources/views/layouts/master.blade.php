<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="title" content="Bulk Buyers Connect - Buy groceries and other items in bulk">
        <meta name="description" content="Bulk Buyers Connect is a platform for individuals to come together to buy groceries and other items in Bulk by the aid of technology. ">
        <meta name="keywords" content="Bulk buying, groceries Buyers, Bulk Buyers, Bulk Buyers Connect, Food Stuff, Food Stuff in Abuja, Abuja Market, Online Market, FCT Market, Buy groceries, Community Market, Bulk buyers app">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta name="author" content="Projaro">
        <title>{{config('app.name')}}</title>
        <meta name="description" content="">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo/favicon.ico')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
{{--        <meta http-equiv="refresh" content="5; {{ route('home') }}" />--}}
        <link rel="stylesheet" href="{{asset('./assets/css/plugins.css')}}">
        <link rel="stylesheet" href="{{asset('./assets/css/sweetalert2.min.css')}}">
        <link rel="stylesheet" href="{{asset('./assets/css/style.css')}}">
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ec14a6984a03d0012de7e21&product=inline-share-buttons' async='async'></script>

    </head>

    <body>

        <div class="off_canvars_overlay">

        </div>

        @include('partials.topmenu')
        @include('partials.stickyheader')
        @yield('content')

        @include('partials.footer')

        @yield('footer')

        @include('partials.loadscripts')

         @yield('scripts')
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">

            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5ec02dc3967ae56c521a6f02/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->


        <script type="text/javascript">
            // $(function () {
            //     setNavigation();
            // });
            //
            // function setNavigation() {
            //     var path = window.location.pathname;
            //     path = path.replace(/\/$/, "");
            //     path = decodeURIComponent(path);
            //
            //     var npath = path.split('/')[1]
            //     $(".main-nav a").each(function () {
            //         $(this).removeClass('active');
            //         var href = $(this).attr('href');
            //         var nhref = href.split('/')[3];
            //
            //         if (npath === nhref) {
            //             $(this).addClass('active');
            //         }
            //     });
            // }
        </script>
        <script type="text/javascript">
            $(function(){
                $('.addtocart').click(function(e){
                    e.preventDefault();
                    url = $(this).attr('href');
                    $.ajax({
                        type: "GET",
                        url:url,
                        success: function(data){
                            console.log(data)
                            $(".cart_quantity").load(location.href + " .cart_quantity>*");

                            //location.reload();mini_cart_wrapper
                            //Swal.fire('product has been healthy')
                        },
                        error: function(data){
                            if(data.status === 401){
                                location.assign("{{route('login')}}");
                            }
                        },
                        dataType : "json"
                    })
                })
            })
        </script>
    </body>

</html>
