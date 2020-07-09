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

                        <h4 class="header-title mt-0 mb-3">All Customers</h4>
                        @include('admin.customer.search')
                        <div style=""></div>
                        @if(Auth::guard('admin')->user()->adminrole->roleid != 2)
                        <div class="btn btn-danger btn-sm" style="margin:0 10px 15px 0;" id="csv">CSV Export</div>
                        <a class="btn btn-danger btn-sm" href="{{route('admin.customer.export')}}" style="margin-bottom:15px" >PDF Export</a><br>
                       @endif
                        <div id="custtable">
                            @include('admin.customer.custtable')
                        </div>
                        <div id="elementH"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('footer')

    @include('admin.partials.masterscripts')
    @include('admin.partials.customerscript')

@endsection

@section('scripts')
{{--    <script src="{{asset('admin/js/jspdf.min.js')}}"></script>--}}
{{--    <script src="{{asset('admin/js/jspdf.plugin.autotable.js')}}"></script>--}}
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
                    let contents = $('#custtable');
                    contents.html(dat);
                }
            })
        }

        function ajaxPaginate(){

        }

        function myvalidate(search){
            return (search === '');
        }

        $(function(){

            $('#paginate').change(function (e) {
               let page = $(this).val();
               let url = $(this).attr('data-href');

                $.ajax({
                    url:url,
                    method:'GET',
                    data: {'paginate':page},
                    success: function(dat){
                        let contents = $('#custtable');
                        contents.html(dat);
                    }
                })
            });

            $('#custsearch').click(function(e){
                e.preventDefault();
                let form = $('#customer');
                let route = form.attr('action');
                let search = $('#detail').val();
                let formdata = form.serialize();

                let valid = myvalidate(search);

                if(valid){
                    swal("Please enter detail of the Customer to be searched");
                }
                else{

                        ajaxActions(route,formdata);

                }


            });

            $('#reforder').click(function(e){
                e.preventDefault();
                let route = $(this).attr('href');
                let loads = $(this).attr('data-info');

                ajaxcall(route, loads);

            });

            // $('#pending').click(function(e){
            //     e.preventDefault();
            //     route = $(this).attr('href');
            //     id = $(this).attr('data-id');
            //     updatePending(route, id)

            $('#pdf').click(function(e){
                //let page = $(this).val();
                let url = $(this).attr('data-href');

                $.ajax({
                    url:url,
                    method:'GET',
                    success: function(dat){
                        //let contents = $('#custtable');
                        //contents.html(dat);
                        console.log(dat);
                    }
                })
            });

            $('#csv').click(function(e){
                $("table").tableHTMLExport({
                    type:'csv',
                    orientation:'p'
                });
            });

            // $('#printing').click(function(e){
            //     e.preventDefault();
            //     $('#prints').printThis({
            //         importCSS: true,
            //         importStyle: true,
            //         loadCSS: false,
            //         pageTitle: "<h1>List of Orders</h1>",
            //     });

            // })

        });

    </script>

@endsection
