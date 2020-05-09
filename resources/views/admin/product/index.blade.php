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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item active">All Products</li>
                            </ol>
                        </div>
                        <h4 class="page-title">All Products</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Refresh</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Products</h4>
                        <div class="row">
{{--                            <div class="col-md-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleFormControlSelect1">Show</label>--}}
{{--                                    <select class="form-control" id="exampleFormControlSelect1">--}}
{{--                                        <option>10</option>--}}
{{--                                        <option>20</option>--}}
{{--                                        <option>30</option>--}}
{{--                                        <option>40</option>--}}
{{--                                        <option>50</option>--}}
{{--                                        <option>100</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-2">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleFormControlSelect1">Sort by</label>--}}
{{--                                    <select class="form-control" id="exampleFormControlSelect1">--}}
{{--                                        <option>Status</option>--}}
{{--                                        <option>Product name (A-Z)</option>--}}
{{--                                        <option>Cost</option>--}}
{{--                                        <option>Category</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-6 offset-md-4">

                            </div>
                            <div class="col-md-2 mt-3">
                                <a href="{{route('create.product')}}" class="btn btn-rounded btn-info btn-block"><i class="fa fa-plus"></i> New Product</a>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>

                                        <tr>
                                            <th>#</th>
                                            <th>Product name</th>
                                            <th>Description</th>
                                            <th>Cost</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>

                                </thead>

                                <tbody>
                                <?php $count = 0 ?>
                                @forelse($products as $key => $list)
                                    <tr>
                                    <td>{{ $key + $products->firstItem() }}</td>
                                    <td class="text-capitalize"><img src="{{asset($list->productimg)}}" width="50" class="img-fluid img-circle">
                                        {{$list->productname}}</td>
                                    <td class="text-capitalize">{{$list->description}}</td>
                                    <td>{{number_format($list->price)}}</td>
                                    <td class="text-capitalize">{{$list->productcategory->prodcatname}}</td>
                                    <td>
                                        @if($list->status)
                                            <span class="badge  badge-success">Enabled</span>
                                        @else
                                            <span class="badge badge-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td><a href="{{route('edit.product',$list->productid)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        @if($list->status > 0)
                                            <a href="{{route('disable.product',$list->productid)}}" class="btn btn-danger btn-xs"><i class="fa fa-close" id="sa-params"></i> Disable</a>
                                        @else
                                            <a href="{{route('disable.product',$list->productid)}}" class="btn btn-primary btn-xs"><i class="fa fa-check-circle" id="sa-params"></i> Enable</a>
                                        @endif
                                    </td>
                                </tr>
                                    @empty
                                    <tr><div class="alert alert-danger text-center"> No product record exits at the moment</div></tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div style="align-content: center; margin-top: 30px" align="center" class="text-center"> {{ $products->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')

    <div class="rightbar-overlay"></div>
    <script src="{{asset('admin/js/vendor.min.js')}}"></script>
    <script src="{{asset('admin/js/switchery.min.js')}}"></script>
    <script src="{{asset('admin/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('admin/js/sweet-alerts.init.js')}}"></script>
    <script src="{{asset('admin/js/form-advanced.init.js')}}"></script>
    <script src="{{asset('admin/js/app.min.js')}}"></script>

@endsection
