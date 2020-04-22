<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="support_info">
                        <p><i class="fa fa-envelope-o"></i><a href="mailto:contact@bulkbuyersconnect.com">contact@bulkbuyersconnect.com</a></p>
                    </div>
                    <div class="top_right text-right">

                            <ul>
                                @guest()
                                    <li><a href="{{route('login')}}"> My Account </a></li>
                                    <li><a href="{{route('register')}}"> Sign up </a></li>
                                    {{--                                    <li><a href="checkout.html"> Checkout </a></li>--}}

                                @else
                                    <li><a href="#" class="text-capitalize"> Welcome {{(Auth::user()->name)}}  </a></li>
                                    <li><a href="{{route('home')}}"> Dashboard </a></li>
                                    <li><a href="{{route('wishlist.view')}}">Wish List</a></li>
                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>

                                @endguest
                            </ul>

                    </div>
                    <div class="search_container">
                        @include('partials.searchform')
                    </div>

                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="{{route('wishlist.view')}}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                            @isset($wishlist)
                                <span class="wishlist_quantity">
                                    {{$wishlist->count()}}
                                </span>
                            @endisset
                        </div>
                        <div class="mini_cart_wrapper">
                            <a href="javascript:void(0)">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                <i class="fa fa-angle-down"></i></a>
                            @if(Session::has('cart'))
                                <span class="cart_quantity">{{Session::get('cart')->totalQty}}</span>

                                <div class="mini_cart">
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">&#8358;{{number_format(Session::get('cart')->totalPrice)}}</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">&#8358;{{number_format(Session::get('cart')->totalPrice)}}</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="{{route('product.viewcart')}}">View Cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="#">Checkout</a>
                                        </div>

                                    </div>

                                </div>
                        @endif
                        <!--mini cart-->

                            <!--mini cart end-->
                        </div>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
{{--                            <li class="menu-item-has-children active">--}}
{{--                                <a href="#">Home</a>--}}
{{--                            </li>--}}
                            @include('partials.menulinks')
                        </ul>
                    </div>

                    <div class="Offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> contact@bulkbuyersconnect.com</a></span>
                        <ul>
                            <li><a class="facebook" href="https://www.facebook.com/BulkBuyersConnect/?ref=br_rs" target="_blank"  title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="https://twitter.com/BulkBuyersNG" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="instagram" href="https://www.instagram.com/bulkbuyersconnect/" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>