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
                                <li class="breadcrumb-item active">Procurement List</li>
                            </ol>
                        </div>
                        <h4 class="page-title" id="gen">Generate Procurement List</h4>
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

                        @include('admin.order.partials.prosearch')
                        <div class="panel-body" id="printthis">
                            <div class="row">

                                <div class="col-md-12 mt-5" id="procure">

                                </div>
                            </div>

                            <!-- -->
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- end container -->
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
                    let contents = $('#procure');
                    contents.html(dat);
                    //console.log(dat)
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



        });


    </script>


@endsection
