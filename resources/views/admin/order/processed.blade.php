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
                        <h4 class="page-title">Processed Orders</h4>
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
                        <form action="{{route('list.orders.update')}}" id="process">
                            @csrf
                            <div class="row">
                                <div class="col-12" id="errmsg"></div>
                                <div class="col-md-8 offset-md-2">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-md-3">
                                                <label class="control-label" style="margin-top: .5rem">Enter Reference Number</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="orderrefno" required placeholder="Reference Number">
                                            </div>
                                            <div class="col-md-2">
                                               <button type="submit" class="btn btn-dark" id="searchref">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                            </div>
                        </form>


                        <div id="processing" style="margin-top: 30px">
                                @include('admin.order.partials.processedlist')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    @include('admin.order.partials.basicscripts')

@endsection

@section('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        function submitAction(route, data){
            $.ajax({
                url:route,
                method:'GET',
                data: data,
                success: function(dat){
                    if(dat.error){
                        let err = dat.error;
                        let state = $("#processing").html('');
                        $.each(err, function(index, value)
                        {
                            state.append('<div class="alert alert-danger text-center"><strong>'+ value +'</strong><div>');
                        });
                    }
                    else{
                        $("#processing").html(dat);

                    }
                }
            })
        }


        function updaterOrder(url, id, ref){
            $.ajax({
                url:url,
                data: {
                    orderid:id,
                    orderrefno: ref
                },
                method: 'GET',
                success: function (data) {
                    $('#processing').html(data);
                }
            })
        }

        $(function(){

            // $('#searchref').click(function(e){
            //     e.preventDefault();
            //     let form = $('form#process');
            //     let route = form.attr('action');
            //     let formdata = form.serialize();
            //     submitAction(route,formdata);
            // });

            $('#updorder').on('click',function(e){
                e.preventDefault();
                route = $(this).attr('href');
                id = $(this).attr('data-id');
                ref = $(this).attr('data-ref');
                updaterOrder(route, id, ref)

            })

        })
    </script>

@endsection


