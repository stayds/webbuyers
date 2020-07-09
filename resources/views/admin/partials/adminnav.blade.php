<div class="topbar-menu">
    <div class="container-fluid">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                     <!--- Super Viewer ----->
                    @if(Auth::guard('admin')->user()->adminrole->roleid == 2 )

                            <li class="has-submenu">
                                <a href="{{route('admin.dashboard')}}">
                                    <i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="{{route('admin.customer.list')}}"><i class="mdi mdi-account-group"></i>Customers</a>
                            </li>

                      <!----Admin 1 all functions aside reports and users---->



                   @elseif(Auth::guard('admin')->user()->adminrole->roleid == 3)

                            <li class="has-submenu">
                                <a href="{{route('admin.dashboard')}}">
                                    <i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#" class="active"> <i class="mdi mdi-shopping"></i>Orders <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    {{-- <li>
                                        <a href="{{route('list.orders')}}">All Orders</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{route('list.orders.recent')}}">Recent Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.processing')}}">Ready to Deliver</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.ready')}}">Delivery in Process</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.delivered')}}">Completed Orders</a>
                                    </li>
                                     <li>
                                        <a href="{{route('procure.list')}}">Procurement</a>
                                    </li>
                                </ul>
                            </li>

{{--                            <li class="has-submenu">--}}
{{--                                <a href="#">--}}
{{--                                    <i class="mdi mdi-food-apple"></i>Product Management <div class="arrow-down"></div></a>--}}
{{--                                <ul class="submenu">--}}

{{--                                    <li>--}}
{{--                                        <a href="{{route('create.product')}}">New Product</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('list.product')}}">All Products</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('list.category')}}">Product Categories</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('create.product.discount')}}">Create Discount</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}

                            <li class="has-submenu">
                                <a href="{{route('admin.customer.list')}}"><i class="mdi mdi-account-group"></i>Customers</a>
                            </li>

                        <!-----Admin 2 Order Management----->
                     @elseif(Auth::guard('admin')->user()->adminrole->roleid == 4)

{{--                            <li class="has-submenu">--}}
{{--                                <a href="{{route('admin.dashboard')}}">--}}
{{--                                    <i class="mdi mdi-view-dashboard"></i>Dashboard</a>--}}
{{--                            </li>--}}

                            <li class="has-submenu">
                                <a href="#" class="active"> <i class="mdi mdi-shopping"></i>Orders <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    {{-- <li>
                                        <a href="{{route('list.orders')}}">All Orders</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{route('list.orders.recent')}}">Recent Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.processing')}}">Ready to Deliver</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.ready')}}">Delivery in Process</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.delivered')}}">Completed Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('procure.list')}}">Procurement</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="{{route('admin.customer.list')}}"><i class="mdi mdi-account-group"></i>Customers</a>
                            </li>
                       <!-- Super Admin Management---->
                     @else
                            <li class="has-submenu">
                                <a href="{{route('admin.dashboard')}}">
                                    <i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                            </li>
{{--                    <li class="has-submenu">--}}
{{--                        <a href="{{route('admin.payment.trans')}}">--}}
{{--                            <i class="mdi mdi-view-dashboard"></i>Payment</a>--}}
{{--                    </li>--}}
                            <li class="has-submenu">
                                <a href="#" class="active"> <i class="mdi mdi-shopping"></i>Orders <div class="arrow-down"></div></a>
                                <ul class="submenu">
                                    {{-- <li>
                                        <a href="{{route('list.orders')}}">All Orders</a>
                                    </li> --}}
                                    <li>
                                        <a href="{{route('list.orders.recent')}}">Recent Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.processing')}}">Ready to Deliver</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.ready')}}">Delivery in Process</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.orders.delivered')}}">Completed Orders</a>
                                    </li>
                                    <li>
                                        <a href="{{route('procure.list')}}">Procurement</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">
                                    <i class="mdi mdi-food-apple"></i>Product Management <div class="arrow-down"></div></a>
                                <ul class="submenu">

                                    <li>
                                        <a href="{{route('create.product')}}">New Product</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.product')}}">All Products</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list.category')}}">Product Categories</a>
                                    </li>
                                    <li>
                                        <a href="{{route('create.product.discount')}}">Create Discount</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="{{route('admin.customer.list')}}"><i class="mdi mdi-account-group"></i>Customers</a>
                            </li>
                            <li class="has-submenu">
                                <a href="{{route('admin.list')}}"><i class="mdi mdi-account-supervisor"></i>Admin Users</a>
                            </li>
                            {{-- <li class="has-submenu">
                                <a href="reports.html"><i class="mdi mdi-file-chart"></i>Reports</a>
                            </li> --}}

                     @endif

            </ul>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
