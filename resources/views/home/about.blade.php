@extends('layouts.master')

@section('content')

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>How it works</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--about section area -->
    <section class="about_section mt-40">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <figure>
                        <div class="about_thumb">
                            <img src="{{asset('assets/img/about/about1.jpg')}}" alt="">
                        </div>
                        <figcaption class="about_content">

                        </figcaption>
                    </figure>
                    <h3 style="margin: 2% 0;">About us</h3>
                    <p>Bulk Buyers Connect as the name implies is a platform for you and other individuals to come together to buy groceries and other items in Bulk by the aid of technology.
                        By logging in via the website or mobile phone app, you can make your orders and the platform will aggregate all orders every week and procure them from our previously sourced and accredited vendors for onward FREE delivery to you FRESH!
                    </p>
                    <p>Deliveries are done weekly on Fridays and Saturdays. All orders made on or before Wednesday of every week will be delivered on Friday/Saturday of the same week while any order after Wednesday will be delivered on Friday/Saturday of the following week.</p>
                    <div style="height: 30px;"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="bg-how">
                                <h3>How Are We Different?</h3>
                                <ul>
                                    <li>We are not a personal shopping site, we only do BULK, that way we get the best prices for all our members.</li>
                                    <li>For every transaction, we aim to save you at least 10%.</li>
                                    <li>We deliver all products fresh except frozen chicken that comes from local organic producers, not imported.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="bg-stand">
                                <h3>We stand for:</h3>
                                <ul>
                                    <li>
                                        <img src="{{asset('assets/img/quality.png')}}" class="img-fluid"><br>
                                        Quality
                                    </li>
                                    <li>
                                        <img src="{{asset('assets/img/price.png')}}" class="img-fluid"><br>
                                        Price</li>
                                    <li>
                                        <img src="{{asset('assets/img/speed.png')}}" class="img-fluid"><br>
                                        Speed</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @include('partials.loadscripts')


@endsection


