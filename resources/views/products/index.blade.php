@extends('layouts.master')

@section('content')

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="shop_area shop_reverse mt-60 mb-60">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-3 col-md-12">--}}
{{--                    <!--sidebar widget start-->--}}
{{--                    <aside class="sidebar_widget">--}}
{{--                        <div class="widget_inner">--}}
{{--                            @include('products.categoryfilter')--}}

{{--                        </div>--}}
{{--                    </aside>--}}
{{--                </div>--}}
                <div class="col-md-12">
                    <!--shop toolbar start-->
                    @include('products.shop_toolbar')

                    @include('products.shoplist')
                </div>
            </div>
        </div>
    </div>



@endsection


