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
                    <h4 class="page-title">All Orders</h4>
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

                    <h4 class="header-title mt-0 mb-3 text-uppercase">Recent Orders</h4>
{{--                    @include('admin.order.partials.ordersearch')--}}
                    <div id="resultab">
                        @include('admin.order.partials.recentdt')
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
                ajax: '{!! route('list.orders.recent') !!}',
                columns: [

                    { data: "checkbox", orderable:false, searchable:false, target:0, className: 'select-checkbox'},
                    {data: 'DT_RowIndex', name: 'orderid'},
                    { data: 'orderrefno', name: 'orderrefno' },
                    { data: 'totalcost', name: 'totalcost' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'orderstatid', name: 'orderstatid' },
                    { data: 'orderby', name: 'orderby' },

                ],
            });

            $('#ord-btn').on('click', function () {
                var orderid = [];
                if(confirm('Are you ready to update')){
                    $('.orders:checked').each(function () {
                        orderid.push($(this).val());
                    })
                    if(orderid.length > 0){
                        $.ajax({
                            url:"{{route('list.orders.update.pending')}}",
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


