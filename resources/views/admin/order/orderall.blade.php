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

                    <h4 class="header-title mt-0 mb-3 text-uppercase">Latest Orders</h4>
                    @include('admin.order.partials.ordersearch')
                    <div id="resultab">
                        @include('admin.order.partials.ordertable')
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function ajaxActions(route, data){
            $.ajax({
                url:route,
                method:'GET',
                data: data,
                success: function(dat){
                    let contents = $('#resultab');
                    contents.html(dat);
                }
            })
        }

        function ajaxcall(url, data){
            $.ajax({
                url:url,
                method:'GET',
                data:{
                    reloadorder: data
                },
                success: function(dat){
                    let contents = $('#resultab');
                    contents.html(dat);
                }
            })
        }

        function compareDates(date1, date2){
            dat1 = new Date(date1);
            dat2 = new Date(date2);

            return (dat2 >= dat1);
        }

        function myvalidate(date1, date2){
            return (date2 === '' || date1 === '');
        }

        function updatePending(url, id){
            $.ajax({
                url:url,
                data: {
                    orderid:id
                },
                method: 'GET',
                success: function (data) {
                    let contents = $('#resultab');
                    contents.html(data);
                }
            })
        }

        $(function(){

            $('#filter').click(function(e){
                e.preventDefault();
                let form = $('#formfilter');
                let route = form.attr('action');
                let date1 = $('#start').val();
                let date2 = $('#end').val();
                let formdata = form.serialize();

                let valid = myvalidate(date1, date2);

                if(valid){
                    swal("Date can not be empty please choose a date");
                }
                else{
                    let compare = compareDates(date1, date2);

                    if(compare){
                        ajaxActions(route,formdata);
                    }
                    else{
                        swal("End Date must be greater than Start Date");
                    }



                }


            });

            $('#reforder').click(function(e){
                e.preventDefault();
                let route = $(this).attr('href');
                let loads = $(this).attr('data-info');

                ajaxcall(route, loads);

            });

            $('#pending').click(function(e){
                e.preventDefault();
                route = $(this).attr('href');
                id = $(this).attr('data-id');
                updatePending(route, id)

            });

            $('#printing').click(function(e){
                e.preventDefault();
                $('#prints').printThis({
                    importCSS: true,
                    importStyle: true,
                    loadCSS: false,
                    pageTitle: "<h1>List of Orders</h1>",
                });

            })

        });





    </script>
@endsection


