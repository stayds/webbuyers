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
                                <li class="breadcrumb-item active">All Orders</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Delivery In Progress</h4>
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
                                <a href="{{ route('list.orders') }}" id="reforder" data-info="loads" class="dropdown-item">Refresh</a>
                            </div>
                        </div>

                        {{--                        <h4 class="header-title mt-0 mb-3 text-uppercase">Processed Orders</h4>--}}
{{--                        <form action="{{route('list.orders')}}" id="formfilter">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12" id="errmsg"></div>--}}
{{--                                <div class="col-md-2">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleFormControlSelect1">Show</label>--}}
{{--                                        <select class="form-control" name="def" id="exampleFormControlSelect1" required>--}}
{{--                                            <option selected value="10">10</option>--}}
{{--                                            <option value="20">20</option>--}}
{{--                                            <option value="30">30</option>--}}
{{--                                            <option value="40">40</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                        <div id="resultab">
                            @include('admin.order.partials.readytable')
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

@section('scripts')

    <script>


        $( function () {
            $('#myTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('list.orders.ready') !!}',
                columns: [
                    { data: "checkbox", orderable:false, searchable:false, target:0, className: 'select-checkbox'},
                    {data: 'DT_RowIndex', name: 'orderid'},
                    { data: 'orderrefno', name: 'orderrefno' },
                    { data: 'totalcost', name: 'totalcost' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'orderstatid', name: 'orderstatid' },
                    { data: 'orderby', name: 'orderby' },
                    { data: 'note', name: 'note' },

                ],
            });

            $('#ord-btn').on('click', function () {
                var orderid = [];
                if(confirm('Are you sure you want to move this order to completed orders?')){
                    $('.orders:checked').each(function () {
                        orderid.push($(this).val());
                    })
                    if(orderid.length > 0){
                        $.ajax({
                            url:"{{route('list.orders.update.delivered')}}",
                            method:"get",
                            data:{orderid:orderid},
                            success: function(data){
                                $('#myTable').DataTable().ajax.reload();
                            }
                        })
                    }
                }
            })
        } );



    </script>

@endsection


