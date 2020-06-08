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
                                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Orders</a></li>
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

                        <h4 class="header-title mt-0 mb-3 text-uppercase">Order Details</h4>
                        <div class="row mb-4">
                            <div class="col-md-7 col-sm-7">
                                <h4> Customer Name: {{$fullname}}</h4>
                                <h4> Order ID: {{$order->orderrefno}}</h4>
                                <h4> Date: {{$order->getFormattedDateAttribute()}}</h4>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                @if(!$page)
                                <a href="{{route('list.orders.delivery.note', $order->orderid)}}" style="margin-right: 20px;" class="btn btn-bordred-success" target="_blank"> <i class="fa fa-print"></i> Print Delivery Note</a>
                                <a href="{{route('admin.customer.order',$order->userid)}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Customer Order</a>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                    <?php $count = 0; ?>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price #</th>
                                        <th>Total Price #</th>
{{--                                        <th>Date added</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($details as $key => $list)
                                        <tr>
                                            <td>{{ $key + $details->firstItem() }}</td>
                                            <td class="text-capitalize">{{ $list->product->productname }}</td>
                                            <td>{{$list->product->description}}</td>
                                            <td>{{$list->quantity}}</td>
                                            <td>{{$list->unitprice}}</td>
                                            <td>{{$list->totalprice}}</td>
{{--                                            <td>{{$list->getFormattedDateAttribute()}}</td>--}}
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <h4>Discount</h4>
                                        </td>
                                        <td>
                                            <h4> &#8358;{{$order->discount}}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-right">
                                            <h4>Total Cost</h4>
                                        </td>
                                        <td>
                                            <h4> &#8358;{{$order->totalcost}}</h4>
                                        </td>
                                    </tr>
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



