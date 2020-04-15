<!--product area start-->
<section class="product_area related_products">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Related Products	</h2>
                </div>
            </div>
        </div>
        <div class="product_carousel product_column5 owl-carousel">
            @forelse($related as $list)
                <article class="single_product">
                <figure>
                    <div class="product_thumb">
                        <a class="primary_img" href="{{url('product/details',Crypt::encrypt($list->productid))}}">
                            <img src="{{asset($list->productimg)}}" alt=""></a>
                        <!--<div class="label_product">
                            <span class="label_sale">sale</span>
                        </div>-->
                        <div class="action_links">
                            <ul>
                                @include('products.wishlist')

{{--                                <li class="quick_button">--}}
{{--                                    <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="ion-ios-search-strong"></span></a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                        @include('products.addtocart')
                    </div>
                    <figcaption class="product_content">
                        <div class="price_box">

                            <span class="current_price">&#8358;{{number_format($list->price)}}</span>
                        </div>
                        <h3 class="product_name"><a href="{{url('product/details',Crypt::encrypt($list->productid))}}">{{$list->productname}}</a></h3>
                        <p class="text-muted">{{$list->description}}</p>
                    </figcaption>
                </figure>
            </article>
            @empty
                <div class="col-12">
                    <article class="text-danger text-center text-capitalize">No Related Product At the moment</article>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!--product area end-->
