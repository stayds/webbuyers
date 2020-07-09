
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <br>
                            <p>Bulk Buyers Connect as the name implies is a platform for you and other individuals to come together to buy groceries and other items in Bulk by the aid of technology.</p>
                            <p class="font-weight-bold">Shop on our mobile app:</p>
                            <ul class="appstore">
                                <li>
                                    <a href="https://play.google.com/store/apps/details?id=com.bulkbuyersconnect.bulk_buyers&hl=en" title="Download from Google Play Store"> <img src="{{asset('assets/img/google-store.png')}}" class="img-fluid"></a>
                                </li>
                                <li>
                                    <a href="#" title="Download from Apple Store"> <img src="{{asset('assets/img/app-store.png')}}" class="img-fluid"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{route('home.about')}}">About Us</a></li>
                                <li><a href="{{route('home.delivery')}}">Delivery Information</a></li>
                                <li><a href="{{route('home.privacy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('home.terms')}}">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="#Refer" data-toggle="modal">Refer-A-Friend</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="https://www.facebook.com/BulkBuyersConnect/?ref=br_rs" target="_blank"  title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="https://twitter.com/BulkBuyersNG" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="https://www.instagram.com/bulkbuyersconnect/" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                            <h3>Refer-A-Friend</h3>
                            <p><div class="sharethis-inline-share-buttons"></div></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; {{date('Y')}} <a href="#">Bulk Buyers Connect</a>  All Right Reserved.</p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <a href="#"><img src="{{asset('assets/img/icon/payment.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!-- modal area end-->
<div class="modal fade" id="LaunchBox" tabindex="-1" role="dialog" aria-labelledby="LaunchBox" aria-hidden="true" data-show="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <div id="popup2">
                    <span class="b-close"><span class="fa fa-times" data-dismiss="modal"></span></span>
                </div>
            </div> -->
            <div class="modal-body">
                <div class="launch-box text-center">
                    <h2>We are Relaunching soon!</h2>
                    <p>Though you can check out our website. We are getting ready for your Bulk Orders.
                        Please avoid placing any orders until <strong>8th June 2020.</strong> We look forward it :)</p>
                    <div id="countdown">
                        <div class="cd-box">
                            <p class="numbers days">00</p><br>
                            <p class="strings timeRefDays">Days</p>
                        </div>
                        <div class="cd-box">
                            <p class="numbers hours">00</p><br>
                            <p class="strings timeRefHours">Hours</p>
                        </div>
                        <div class="cd-box">
                            <p class="numbers minutes">00</p><br>
                            <p class="strings timeRefMinutes">Mins</p>
                        </div>
                        <div class="cd-box">
                            <p class="numbers seconds">00</p><br>
                            <p class="strings timeRefSeconds">Secs</p>
                        </div>
                    </div>
                    <!-- end div#countdown -->
                    <div class="clearfix"></div>
                    <p><img src="{{asset('assets/img/launch.png')}}" class="img-fluid count"></p>
                </div>
            </div>
        </div>
    </div>
</div>
