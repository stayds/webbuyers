<!--sticky header area start-->
<div class="sticky_header_area sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="sticky_header_right menu_position">
                    <div class="main_menu">
                        <nav>
                            <ul>
                                @include('partials.menulinks')
                            </ul>

                        </nav>
                    </div>
                    <div class="middel_right_info">
                        <div class="header_wishlist">
                            <a href="{{route('wishlist.view')}}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>

                            @if(request()->session()->get('wishlist') > 0)
                                <span class="wishlist_quantity">
                                    {{request()->session()->get('wishlist')}}
                                </span>
                            @endif
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
                </div>
            </div>
        </div>
    </div>
</div>
<!--sticky header area end-->
