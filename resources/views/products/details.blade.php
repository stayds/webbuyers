@extends('layouts.master')

@section('content')

    <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li><a href="{{route('product.list')}}">shop</a></li>
                        <li>product details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1">
                            <a href="#" disabled>
                                <img src="{{asset($result->productimg)}}" data-zoom-image="{{asset($result->productimg)}}" alt="big-1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="#">

                            <h1>{{$result->productname}}</h1>
{{--                            <div class="product_nav">--}}
{{--                                <ul>--}}
{{--                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
{{--                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            <div class="price_box">
                                <span class="current_price">&#8358;{{number_format($result->price)}}</span>

                            </div>
                            <div class="product_desc">
                                <p>{{$result->description}} </p>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="100" value="1" type="number">
                                <a href="{{route('product.addtocart',['productid'=>Crypt::encrypt($result->productid)])}}" data class="button" type="submit">add to cart</a>

                            </div>
                            <div class=" product_d_action">
                                <ul>
                                    <li><a href="{{route('wishlist.add',['productid'=>Crypt::encrypt($result->productid)])}}" title="Add to wishlist">+ Add to Wishlist</a></li>
                                </ul>
                            </div>
                            <div class="product_meta">
                                <span>Category: <a href="{{url('product/list',Crypt::encrypt($result->prodcatid))}}" class="text-capitalize">{{$result->productcategory->prodcatname}}</a></span>
                            </div>

                        </form>
{{--                        <div class="priduct_social">--}}
{{--                            <ul>--}}
{{--                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>--}}
{{--                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>--}}
{{--                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>--}}
{{--                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>--}}
{{--                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('products.related')

    @include('partials.loadscripts')

@endsection
