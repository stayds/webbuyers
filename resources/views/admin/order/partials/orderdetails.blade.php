@extends('admin.layout.master')

@section('bulk')
    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item"><a href="{{route('list.orders')}}">Orders</a></li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Order Details</h4>
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
{{--                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                <!-- item-->--}}
{{--                                <a href="{{ route('list.orders') }}" id="reforder" data-info="loads" class="dropdown-item">Refresh</a>--}}
{{--                            </div>--}}
                        </div>

                        <h4 class="header-title mt-0 mb-3 text-uppercase">Details</h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                    <?php $count = 0; ?>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price #</th>
                                        <th>Total Price #</th>
                                        <th>Date added</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($details as $list)
                                        <tr>
                                            <td>{{ ++$count }}</td>
                                            <td class="text-capitalize">{{ $list->product->productname }}</td>
                                            <td>{{$list->quantity}}</td>
                                            <td>{{$list->unitprice}}</td>
                                            <td>{{$list->totalprice}}</td>
                                            <td>{{$list->getFormattedDateAttribute()}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                            </table>
                            <nav>
                                <div class="m-b-0 mt-2 justify-content-center">
                                    {{$details->links()}}
                                </div>

                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    @include('admin.partials.dashscripts')

@endsection



