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
                            <li>Frequently Questions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--faq area start-->
    <div class="faq_content_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq_content_wrapper">

                        <p>Joining the Bulk Buyers Connect is a decision that marks the beginning of a long lasting relationship, we do not see you as just a client but as a partner.</p>

                        <p>Feel free to reach us: contact@bulkbuyersconnect.com, we will respond in a timely fashion.</p>

                        <p>Below is a list of questions we are frequently asked and some helpful answers.
                            </p>
                            <p>&nbsp;</p>
                        <h4>Below is a list of questions we are frequently asked and some helpful answers. </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--Accordion area-->
    <div class="accordion_area">
        <div class="container">
            <div class="row">
            <div class="col-12">
                <div id="accordion" class="card__accordion">
                  <div class="card card_dipult">
                    <div class="card-header card_accor" id="headingOne">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Which cities are covered by Bulk Buyers Connect?

                          <i class="fa fa-plus"></i>
                          <i class="fa fa-minus"></i>

                        </button>

                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                           <p>As at now only residents of Abuja, Nigeria can benefit from the services of Bulk buyers Connect. Other cities in Nigeria are coming online soon. </p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingTwo">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            If I make my order in the 2nd week of the month, why do I have to wait till the last week of the month to get my products?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>

                        </button>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <p>The wait is in order to allow as many members as possible make their orders because the more orders made the more assured we are of bigger savings on all purchases.</p>
                      </div>
                    </div>
                  </div>
{{--                  <div class="card  card_dipult">--}}
{{--                    <div class="card-header card_accor" id="headingThree">--}}
{{--                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
{{--                            Is it safe to put my debit card details on this site?--}}
{{--                           <i class="fa fa-plus"></i>--}}
{{--                           <i class="fa fa-minus"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">--}}
{{--                      <div class="card-body">--}}
{{--                        <p>Yes it is. We don’t store any of your debit card details, all payments are processed by our payment processor, ‘Paystack’, who are one of the best in the industry.</p>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingfour">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                            What is your privacy policy?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapseeight" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                      <div class="card-body">
                        <p>We will never share your information with any third party, that means anyone other than you and us.</p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingfive">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                            What are the products available on Bulk Buyers Connect?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapseseven" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                      <div class="card-body">
                        <p>There are currently nine (9) products available. Namely: Tomatoes, Pepper, Goat meat, Crayfish, Snails, Onions, Palm oil, Stock fish and Dried Fish.
                            The products list will be expanded over the coming weeks. Members will have a say on which products are added to the list. </p>
                      </div>
                    </div>
                  </div>

                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingsix">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            Can I transfer money for my order to an account?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                      <div class="card-body">
                        <p>The preferred mode of payment for all orders is by the secured payment gateway online via the website portal or app using a MasterCard or Visa Card. </p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingseven">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            Is there minimum order amount for members of the Bulk Buyers Connect?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapsefive" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                      <div class="card-body">
                        <p>The minimum total value for orders per customer is N20,000. </p>
                      </div>
                    </div>
                  </div>
                  <div class="card  card_dipult">
                    <div class="card-header card_accor" id="headingeight">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                            My order hasn’t arrived?
                           <i class="fa fa-plus"></i>
                           <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <div id="collapsesix" class="collapse" aria-labelledby="headingeight" data-parent="#accordion">
                      <div class="card-body">
                        <p>Please check your order confirmation email for the order code and confirm timing of delivery, if that doesn’t solve it pls send us an email: contact@bulkbuyersconnect.com and we will sort it out.</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!--Accordion area end-->
    <!--faq area end-->




@endsection


