@extends('admin.layout.master')

@section('bulk')

    <div class="wrapper">

        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item active">Delivered Orders</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Delivery Note</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">
                        <!-- <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div> -->
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <img src="{{asset('admin/images/logo-round.png')}}">
                                    <h3>Bulk Buyers Connect</h3>
                                </div>
                                <div class="float-right">
                                    <h4>Order Ref # <strong>{{$order->orderrefno}}</strong><br><br>

                                    </h4>
                                    <h4>Received By: <br><br>
                                        <strong>____________________</strong>
                                    </h4>
                                    <h4>Sign: <br><br>
                                        <strong>____________________</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="float-left mt-3">
                                        <address class="text-capitalize">
                                            <strong>{{$order->user->billingaddress->fullname()}}</strong><br>
                                            {{$order->user->billingaddress->address}}<br>
                                            {{$order->user->billingaddress->state->statename}}<br>
                                        </address>
                                    </div>
                                    <div class="float-right mt-3">
                                        <p><strong>Order Date: </strong> {{$order->getFormattedDateAttribute()}}</p>
{{--                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Processed</span></p>--}}
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <?php $count = 0; ?>
                                            <thead>
                                            <tr><th>#</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost (&#8358;)</th>
                                                <th>Total (&#8358;)</th>
                                            </tr></thead>
                                            <tbody>
                                            @foreach($details as $list)
                                                <tr>
                                                    <td>{{ ++$count }}</td>
                                                    <td class="text-capitalize">{{ $list->product->productname }}</td>
                                                    <td class="text-capitalize">{{ $list->product->description }}</td>
                                                    <td>{{$list->quantity}}</td>
                                                    <td>{{number_format($list->unitprice)}}</td>
                                                    <td>{{number_format($list->totalprice)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-6">
                                    <div class="clearfix mt-4">
{{--                                        <h5 class="text-dark">PAYMENT TERMS AND POLICIES</h5>--}}

{{--                                        <small>--}}
{{--                                            Some notification or some terms and conditions can go here--}}
{{--                                        </small>--}}
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6 offset-xl-3">
                                    <p class="text-right"><b>Sub-total: </b> &#8358;{{number_format($order->totalcost)}}</p>
                                    <p class="text-right"><b>Discout: </b> &#8358;{{number_format($order->discount)}}</p>
                                    <!--<p class="text-right">VAT: 7.5%</p>-->
                                    <hr>
                                    <h3 class="text-right">&#8358;{{number_format($order->totalcost)}}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="d-print-none">
                                <div class="float-right">
                                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light btn-lg mr-2"><i class="fa fa-print"></i> PRINT</a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light btn-lg">PDF</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div>

    </div>

@endsection
