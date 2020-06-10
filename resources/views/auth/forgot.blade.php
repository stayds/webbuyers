@extends('layouts.master')

@section('content')

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Forgot Password</h1>
                                <div class="stripe-bottom"></div>
                            </div>
                        </div>
                        <form action="{{route('pass.reset')}}" method="post" name="login" id="resetf">
                            @csrf
                            <div id="info">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div id='loader' style='display:none;position: absolute;left: 40%;'>
                                <img src='{{asset('assets/img/loader.gif')}}' width='100px' height='100px'>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" id="resetu" name="email"  class="form-control" aria-describedby="emailHelp">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <p class="text-center"> Please ensure enter your registered email</p>
                            </div>
                            <div class="col-md-12 text-center mb-3 mt-4">
                                <button type="submit" id="resetb" class=" btn btn-block mybtn btn-login tx-tfm btn-lg">Email Password</button>
                            </div>
                            <div class="form-group">
                                <p class="text-center"> <a href="{{route('login')}}">I will like to login now</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(function() {
            $('#resetb').click(function(e){
                e.preventDefault();
                let form = $('#resetf');
                let route = form.attr('action');

                $.ajax({
                    url:route,
                    method:'POST',
                    data: form.serialize(),
                    beforeSend: function(){
                        // Show image container
                        $( "#resetu" ).prop( "disabled", true );
                        $("#loader").show();
                    },
                    success: function(data){
                        //console.log(data);

                        if(data){
                            let con = '<div class="alert alert-success">Please check your email for password reset instruction</div>'
                            $('div#info').html(con);
                        }
                    },
                    error: function(data){
                        let con = '<div class="alert alert-danger">This email does not exist on this platform</div>'
                        $('div#info').html(con);
                    },
                    complete:function(data){
                        // Hide image container
                        $( "#resetu" ).prop( "disabled", false ).val('');
                        $("#loader").hide();
                    }
                })

            })
        });



    </script>

@endsection
