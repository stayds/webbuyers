
    <div class="main_menu_area">
        <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-12">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle">ALL CATEGORIES</h2>
                    </div>
                    <div class="categories_menu_toggle">
                        <ul>
                            @foreach($category as $list)
                                <li><a href="{{url('/product/list',$list->prodcatid)}}">{{$list->prodcatname}}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="main_menu menu_position">
                    <nav>
                        <ul class="main-nav">
                            <li><a class="active"  href="{{url('/')}}">home</a>
                            </li>
                            <li><a href="{{route('product.list')}}">Shop</a></li>
                            <li><a href="{{route('home.howitworks')}}">How it works</a></li>
                            <li><a href="{{route('home.faq')}}">FAQs</a></li>
{{--                            <li><a href="{{route('home.about')}}">about Us</a></li>--}}
                            <li><a href="{{route('home.contact')}}"> Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>


