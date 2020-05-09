@extends('admin.layout.master')


@section('bulk')

    <header id="topnav">

        @include('admin.partials.toplink')

        @include('admin.partials.adminnav')

    </header>

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item active"><a href="{{route('admin.customer.list')}}"> Customers</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Customers</h4>
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
                                <a href="{{route('admin.customer.list')}}" class="dropdown-item">Refresh</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Customers Orders</h4>
                        <div class="row mb-4">
                            <div class="col-md-9 col-sm-9">
                                <h4> Customer Name: {{$fullname}}</h4>
                                <h4>No. of Orders: {{$orderno}}</h4>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a href="{{route('admin.customer.list')}}" class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> Back to Customer List</a>
                            </div>
                        </div>

                        <div class="table-responsive">

                            <div id="prints">
                                <table class="table table-hover mb-0">
                                    @if($userorders)
                                        <?php $count = 0; ?>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Reference</th>
                                            <th>Total Cost</th>
                                            <th>Qty</th>
                                            <th>Date added</th>
                                            <th>Delivery Note</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($userorders as $key => $list)

                                            <tr>
                                                <td>{{ $key + $userorders->firstItem() }}</td>
                                                <td><a href="{{ route('list.orders.details', ['id'=>$list->orderid]) }}"> {{$list->orderrefno }}</a></td>
                                                <td>&#8358;{{number_format($list->totalcost)}}</td>
                                                <td>{{ $list->qty }}</td>
                                                <td>{{$list->getFormattedDateAttribute()}}</td>
                                                <td><a href="{{route('list.orders.delivery.note', ['orderid'=>$list->orderid])}}" class="btn btn-sm btn-bordred-success" target="_blank"> <i class="fa fa-print"></i> Delivery Note</a> </td>
                                            </tr>

                                        @empty
                                            <tr><td colspan="7"><div class="alert alert-danger text-center"> No record exists </div> </td></tr>
                                        @endforelse

                                        </tbody>
                                    @else
                                        <tr>
                                            <td><div class="text-danger text-center text-capitalize"> No order exist at the moment </div> </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            <nav>
                                <div class="m-b-0 mt-2 justify-content-center">
                                    {{$userorders->links()}}
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

    @include('admin.partials.masterscripts')

@endsection

@section('scripts')

    <script>

        $(function(){

            $('#pdf').click(function(e){
                $("table").tableHTMLExport({
                    type:'pdf',
                    orientation:'p'
                });
            });

            $('#csv').click(function(e){
                $("table").tableHTMLExport({
                    type:'csv',
                    orientation:'p'
                });
            });

        });

    </script>

@endsection
