@extends('layouts.errors')

@section('content')

    <!--error section area start-->
    <div class="error_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>404</h1>
                        <h2>Sorry your session has expired.</h2>
                        <p>Please refresh and try again.</p>
                        {{--                        <form action="#">--}}
                        {{--                            <input placeholder="Search..." type="text">--}}
                        {{--                            <button type="submit"><i class="ion-ios-search-strong"></i></button>--}}
                        {{--                        </form>--}}
                        <a href="{{ url()->previous() }}">Return Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->

@endsection
