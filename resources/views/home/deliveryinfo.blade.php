@extends('layouts.master')

@section('content')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Delivery Policy</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--section area -->
    <div class="privacy_policy_main_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="privacy_policy_header">
                        <h1>Delivery Policy</h1>
                    </div>
                    <div class="privacy_content section_1">
                        <h2>When will I receive my order</h2>
                        <p>Deliveries are done weekly on Fridays and Saturdays. All orders made on or before Wednesday of every week will be delivered on Friday/Saturday of the same week while any order after Wednesday will be delivered on Friday/Saturday of the following week.</p>
                    </div>
                    <div class="privacy_content section_2">
                        <h2>How much does delivery cost?</h2>
                        <p>We only operate in Abuja for now and all our deliveries within Abuja and immediate environs are absolutely FREE! </p>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- section end-->

@endsection
