<div class="row shop_wrapper">
  @forelse($products as $list)

        <div class="col-lg-4 col-md-4 col-12 ">
             <article class="single_product">
            <figure>
                <div class="product_thumb">
                    <a class="primary_img" href="{{url('product/details',Crypt::encrypt($list->productid))}}">
                        <img src="{{asset($list->productimg)}}" alt=""></a>
                    <!--<div class="label_product">
                        <span class="label_sale">sale</span>
                    </div>-->
                    @include('products.wishlist')
                    @include('products.addtocart')
                </div>
                <div class="product_content grid_content">
                    <div class="price_box">
                        <span class="current_price">&#8358;{{number_format($list->price)}}</span>
                    </div>

                    <h3 class="product_name grid_name"><a class="font-weight-bold" href="{{url('product/details',Crypt::encrypt($list->productid))}}">{{$list->productname}}</a></h3>
                    <div class="product_desc">
                        <p>{{$list->description}}</p>
                    </div>
                </div>
                <div class="product_content list_content">
                    <div class="left_caption">
                        <div class="price_box">

                            <span class="current_price">&#8358;{{number_format($list->price)}}</span>
                        </div>
                        <h3 class="product_name"><a href="{{url('product/details',Crypt::encrypt($list->productid))}}">{{$list->productname}}</a></h3>

                        <div class="product_desc">
                            <p>{{$list->description}}</p>
                        </div>
                    </div>
                    <div class="right_caption">
                        <div class="add_to_cart">
                            <a href="cart.html" title="add to cart">Add to cart</a>
                        </div>
                        <div class="action_links">
                            <ul>
                                <li class="wishlist">
                                    <a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>  Add to Wishlist</a></li>
                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <span class="ion-ios-search-strong"></span> Quick View</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </figure>
        </article>
        </div>
      @empty
        <div class="col-lg-12 col-md-12 col-12">
            <article class="text-center text-danger bold">No Products Exits for this Category</article>
        </div>
  @endforelse



</div>

{{ $products->links() }}
