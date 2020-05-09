@extends('layouts.master')

@section('content')

    @include('customer.partials.breadcum')

    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        @include('customer.partials.menu')
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">

                        <div class="tab-pane fade show active" id="content">
                            @include('customer.partials.dashcontent')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('footer')

@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){

            function ajaxcall(url){
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        $('#content').html(data);
                    }
                })
            }

            $('#dashboard').click(function(){
                url = $(this).attr('href');
                ajaxcall(url);
            });



            $('#pwd').click(function () {
                url = $(this).attr('href');
                ajaxcall(url);
            });
            $('#orders').click(function(){
                url = $(this).attr('href');
                ajaxcall(url);
            });
            $('#payments').click(function(){
                url = $(this).attr('href');
                ajaxcall(url);
            });
            $('#details').click(function(){
                url = $(this).attr('href');
                ajaxcall(url);
            });



        });


    </script>


@endsection
