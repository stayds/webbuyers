@extends('admin.layout.master')


@section('bulk')

    <header id="topnav">

        @include('admin.partials.toplink')

        @include('admin.partials.adminnav')

    </header>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item active">Product Categories</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Product Categories</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">

                    @include('admin.product.categoryform')

            </div>

            <div class="row">

                    @include('admin.product.categorylist')

            </div>
        </div>
    </div>

@endsection


@section('footer')

    @include('admin.partials.morescripts')

@endsection
