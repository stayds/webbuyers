<section class="featured_product_area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row featured_container featured_column3">
            @foreach($products as $list)
                <div class="col-lg-4">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{url('/product/details',Crypt::encrypt($list->productid))}}">
                                <img src="{{asset($list->productimg)}}" alt=""></a>
                            <!-- <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div> -->
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="current_price">&#8358;{{number_format($list->price)}}</span>
                            </div>
                            <h3 class="product_name"><a href="{{url('product/details',Crypt::encrypt($list->productid))}}">{{$list->productname}}</a></h3>
                            <small class="text-muted" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">{{$list->description}}</small>
                            @include('products.addtocart')
                        </figcaption>
                    </figure>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
