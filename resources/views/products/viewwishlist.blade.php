@extends('layouts.master')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--wishlist area start -->
    <div class="wishlist_area mt-60">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc wishlist">
                            <div class="cart_page table-responsive">
                                @if ($message = Session::get('wishsuccess'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Stock Status</th>
                                        <th class="product_total">Add To Cart</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @forelse($wishlist as $list)
                                            <tr>
                                                <form></form>
                                                <td class="product_remove">

                                                    <form id="{{Crypt::encrypt($list->productid)}}" class="wishremove" name="wishlist" action="{{ route('wishlist.remove',Crypt::encrypt($list->productid)) }}" method="POST">
                                                        @csrf
                                                        <button style="background: inherit; border: none" class="text-danger" type="submit">X</button>
                                                    </form>

                                                </td>
                                                <td class="product_thumb"><a href="{{url('product/details',Crypt::encrypt($list->productid))}}">
                                                        <img src="{{asset($list->productimg)}}" alt=""></a></td>
                                                <td class="product_name"><a href="{{url('product/details',Crypt::encrypt($list->productid))}}">{{$list->productname}}</a></td>
                                                <td class="product-price">&#8358;{{number_format($list->price)}}</td>
                                                <td class="product_quantity">In Stock</td>
                                                <td class="product_total"><a href="{{route('product.addtocart',['productid'=>Crypt::encrypt($list->productid)])}}">Add To Cart</a></td>
                                            </tr>
                                           @empty
                                                <div >
                                                    <article class="text-center text-capitalize text-danger">
                                                        No record exist at the moment
                                                    </article>
                                                </div>
                                       @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="wishlist_share">--}}
{{--                        <h4>Share on:</h4>--}}
{{--                        <ul>--}}
{{--                            <li><a href="#"><i class="fa fa-rss"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
    <!--wishlist area end -->
@endsection
