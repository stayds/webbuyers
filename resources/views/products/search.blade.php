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
                            <li>search</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop_area shop_reverse mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            @include('products.categoryfilter')
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row shop_wrapper">
                        @forelse($result as $list)

                            <div class="col-lg-4 col-md-4 col-12 ">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="{{url('product/details',$list->productid)}}">
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

                                            <h3 class="product_name grid_name"><a href="{{url('product/details',$list->productid)}}">{{$list->productname}}</a></h3>
                                            <div class="product_desc">
                                                <p>{{$list->description}}</p>
                                            </div>
                                        </div>
                                        <div class="product_content list_content">
                                            <div class="left_caption">
                                                <div class="price_box">

                                                    <span class="current_price">&#8358;{{number_format($list->price)}}</span>
                                                </div>
                                                <h3 class="product_name"><a href="{{url('product/details',$list->productid)}}">{{$list->productname}}</a></h3>

                                                <div class="product_desc">
                                                    <p>{{$list->description}}</p>
                                                </div>
                                            </div>
                                            <div class="right_caption">
                                                @include('products.wishlist')
                                                @include('products.addtocart')
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 col-12">
                                <article class="text-center text-danger bold">No Products gotten from the search</article>
                            </div>
                        @endforelse
                </div>
            </div>
        </div>
    </div>



@endsection
