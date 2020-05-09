@extends('layouts.master')

@section('content')

    @include('customer.partials.breadcum')

    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">

                        <div class="tab-pane fade show active font-18 text-center" id="content">
                           <h3>Hi {{$user->name}}, payment for order #{{$paydone->order->orderrefno}}
                            @if($paydone->paymentstatusid === 2)
                                   was <span class="text-success"> Successful</span>
                            @else
                                <span class="text-danger"> Unsuccessful</span>, <span>kindly try again or contact your financial institution. </span>
                            @endif
                           </h3>
                            <a class="btn btn-dark addmargin50" href="{{route('home')}}">Click to return to Dashboard</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

