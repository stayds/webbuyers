<!-- cumulative figures -->

<div class="row">
    @if(Auth::guard('admin')->user()->adminrole->roleid != 4)

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
    {{--            <div class="dropdown float-right">--}}
    {{--                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">--}}
    {{--                    <i class="mdi mdi-dots-vertical"></i>--}}
    {{--                </a>--}}
    {{--                <div class="dropdown-menu dropdown-menu-right">--}}
    {{--                    <!-- item-->--}}
    {{--                    <a href="javascript:void(0);" class="dropdown-item">View details</a>--}}
    {{--                    <!-- item-->--}}
    {{--                    <a href="javascript:void(0);" class="dropdown-item">Refresh report</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}

                <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-left" dir="ltr">
                        <i class="mdi mdi-cash-multiple mdi-48px text-primary"></i>
                    </div>

                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $payment }} </h2>
                        <p class="text-muted mb-1">Revenue as at today</p>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
    {{--            <div class="dropdown float-right">--}}
    {{--                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">--}}
    {{--                    <i class="mdi mdi-dots-vertical"></i>--}}
    {{--                </a>--}}
    {{--                <div class="dropdown-menu dropdown-menu-right">--}}
    {{--                    <!-- item-->--}}
    {{--                    <a href="javascript:void(0);" class="dropdown-item">View details</a>--}}
    {{--                    <!-- item-->--}}
    {{--                    <a href="javascript:void(0);" class="dropdown-item">Refresh report</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}

                <h4 class="header-title mt-0 mb-4">Total Orders</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-left" dir="ltr">
                        <i class="mdi mdi-shopping mdi-48px text-danger"></i>
                    </div>

                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $orders }} </h2>
                        <p class="text-muted mb-1">Total Orders as at today</p>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="{{route('list.product')}}" class="dropdown-item">View details</a>
                        <!-- item-->
    {{--                    <a href="javascript:void(0);" class="dropdown-item">Refresh report</a>--}}
                    </div>
                </div>

                <h4 class="header-title mt-0 mb-4">Products</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-left" dir="ltr">
                        <i class="mdi mdi-food mdi-48px text-warning"></i>
                    </div>

                    <div class="widget-detail-1 text-right">
                        <h2 class="font-weight-normal pt-2 mb-1"> {{ $products }} </h2>
                        <p class="text-muted mb-1">Total products right now</p>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
        <div class="card-box">
            <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a href="{{route('admin.customer.list')}}" class="dropdown-item">View Details</a>
                    <!-- item-->
{{--                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>--}}
                </div>
            </div>

            <h4 class="header-title mt-0 mb-4">Total Customers</h4>

            <div class="widget-chart-1">
                <div class="widget-chart-box-1 float-left" dir="ltr">
                    <i class="mdi mdi-account-group mdi-48px text-success"></i>
                </div>

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{ $user }} </h2>
                    <p class="text-muted mb-1">Total Customers right</p>
                </div>
            </div>
        </div>

    </div><!-- end col -->

   @else

    <div class="col-xl-6 col-md-6">
        <div class="card-box">


            <h3 class=" mt-0 mb-4">Welcome {{Auth::guard('admin')->user()->fname}}</h3>

            <div class="widget-chart-1">

                <div class="widget-detail-1 text-right">
                    <h2 class="font-weight-normal pt-2 mb-1"> {{date('Y-m-d')}} </h2>
                    <p class="text-muted mb-1">today</p>
                </div>
            </div>
        </div>

    </div>

  @endif

</div>
<!-- end row -->
