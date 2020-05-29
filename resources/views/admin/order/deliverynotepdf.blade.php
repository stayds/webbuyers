<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delivery note </title>
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <style>

    </style>

</head>

<body>
    <div class="wrapper-tp">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
{{--                    <div class="page-title-box">--}}
{{--                        <div class="page-title-right">--}}
{{--                            <ol class="breadcrumb m-0">--}}
{{--                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Buyers Connect</a></li>--}}
{{--                                <li class="breadcrumb-item active">Deliverd Orders</li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                        <h4 class="page-title">Delivery Note</h4>--}}
{{--                    </div>--}}
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
                            <div class="text-center">
                                <img src="{{asset('admin/images/logo-round.png')}}">
                                <h3>Bulk Buyers Connect</h3>
                            </div>
                            <div class="clearfix">
                                <div class="float-left text-center mt-3">
                                    <h3>Delivery Note/Invoice</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="float-left mt-3">
                                        <address>
                                            <strong>{{$order->user->billingaddress->fullname()}}</strong><br>
                                            {{$order->user->billingaddress->address}}<br>
                                            {{$order->user->billingaddress->state->statename}}<br>
                                            <abbr title="Phone">P:</abbr> {{$order->user->phone}}
                                        </address>
                                    </div>
                                    <div class="float-right mt-3">
                                        <h4>Order No: {{$order->orderrefno}}
                                        </h4>
                                        <p class="lead"><strong>Order Date: </strong> {{$order->getFormattedDateAttribute()}}</p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <?php $count = 0; $sum = 0; ?>
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
                                                    {{$sum = $sum + $list->totalprice}}
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
                                        <h4>Received By: <br><br><br>
                                            <strong>_______________________</strong>
                                        </h4>
                                        <h4>Signature: <br><br><br>
                                            <strong>_______________________</strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6 offset-xl-3">
                                    <p class="text-right"><b>Sub-total:</b> &#8358;{{number_format($sum)}}</p>
                                    <p class="text-right" style="margin-right:13px"><b>Discount:</b> &#8358;{{number_format($order->discount)}}</p>

                                    <!--<p class="text-right">Discout: 9%</p>
                                    <p class="text-right">VAT: 7.5%</p>-->
                                    <hr>
                                    <h3 class="text-right"> &#8358;{{number_format($order->totalcost)}}</h3>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2019 &copy; Bulk Buyers Connect
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">Visit main site</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
