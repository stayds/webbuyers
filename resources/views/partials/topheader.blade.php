
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="support_info">
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            <a href="mailto:contact@bulkbuyersconnect.com">contact@bulkbuyersconnect.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-right">

                            <ul>
                                @guest()
                                    <li><a href="{{route('login')}}"> My Account </a></li>
                                    <li><a href="{{route('register')}}"> Sign up </a></li>
{{--                                    <li><a href="checkout.html"> Checkout </a></li>--}}

                                @else
                                    <li><span href="#" class="font-weight-bold text-capitalize"> Welcome {{(Auth::user()->name)}}  </span></li>
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
            </div>
            </div>
        </div>
    </div>
