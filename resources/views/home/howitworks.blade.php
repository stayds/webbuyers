@extends('layouts.master')

@section('content')



   <!--breadcrumbs area start-->
   <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li>How it works</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--about section area -->
<section class="about_section mt-60">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
               <figure>
                    <div class="about_thumb">
                    <img src="{{asset('assets/img/about/about1.jpg')}}" alt="">
                    </div>
                    <figcaption class="about_content">
                        <h1>How it works</h1>
                        <p>Orders are made monthly by members starting from the 3rd week of every month till the last week of the month with every member putting money into a pool fund via a secure payment gateway using their MasterCard or Visa card on the app or online portal for their selected purchases during this period. Orders/payments after the 29th day of every month will automatically only apply to the next months cycle of purchases.</p>
                        <p>Note that each member would have chosen from a list of  items what their funds will be used to purchase.</p>
                        <p>All purchases are delivered from the last week of the current month into the first week of the new month, a notification will be sent to each member to inform them of their pickup location and time or the delivery time of their product.
                            </p>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</section>
<!--about section end-->


@endsection


