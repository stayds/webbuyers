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
                            <li>Privacy Policy</li>
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
                        <h1>Privacy Policy</h1>
                    </div>
                    <div class="privacy_content section_1">
                        <h2>Who we are</h2>
                        <p>Bulk Buyers Connect is an ecommerce platform that focuses on the use of technology to help their clients or members procure fresh groceries and other products at bulk purchase prices by aggregating the different retail orders of the clients to leverage vendors to offer lower prices.</p>
                        <p>Bulk Buyers Connect Limited  is responsible for our website www.bulkbuyersconnect.com, and whether you browse as a guest or register with us we will collect different types of information about you: for example, for website functionality; to provide improved or personalised services to you; and, in accordance with your chosen preferences, to market goods or services to you. Please also see our website terms and conditions.</p>
                        <p>We are not responsible for the content or privacy practices of external sites, third party Apps or your chosen internet browser. However, we do seek to explain how we work with third parties, including search engines and ad servers such as Google. You can also see Google’s Privacy Policy.
                        </p>
                    </div>
                    <div class="privacy_content section_2">
                        <h2>1. What information do we gather?</h2>
                        <p>The information that we gather falls broadly into two types (please see further below for how we collect it and what we use it for):</p>
                        <p>1.1 Information that relates directly to you (e.g. your name and contact details, communication preferences and customer history).</p>
                        <p>1.2 Information that does not directly identify you (e.g. how you might browse our website), specifically:</p>
                        <ol>
                            <li>(1) Your IP address through the placement of cookies; and</li>
                            <li>(2) Location data, which might be gained through your IP address or GPS data (see Section 3 (4), below).</li>
                        </ol>

                        <p>Please note that not all cookies are either personally identifiable information or even unique identifiers; but some can be, while others can influence what you see on our website and others (see Sections 6 and 7 on cookies and their management, below).</p>
                    </div>
                    <div class="privacy_content section_3">
                        <h2>2. How we use your information</h2>
                        <h4>2.1 When we seek your permission. </h4>
                        <p>Often we will be using your information in accordance with your specific consent or instructions: for example, because you have requested or consented to receiving certain information, or entered into a contract with us (or one of Our Brands) for goods and services: see Section 2.2 below.</p>
                        <p>At other times we will use your information on one of the other lawful bases described below in this section.</p>
                        <h4>2.2 Contract.</h4>
                        <p>(1) When you enter into a contract for goods or services with us (including competitions, offers, subscriptions or your online Telegraph account), or where you wish to register an interest in doing so, we will use your personal data to enter into and fulfil our contractual relationship with you.</p>
                        <p>(2) Fulfilling our contract with you means being able to manage and administer our services, and maintain our standards of tailored service levels, customer care and consumer compliance. This might include fulfilling orders or returns, processing payments or refunds, and providing aftercare, as well as improving your customer experience online and otherwise, including by monitoring service levels and responding to feedback.</p>
                        <h4>2.3 Legitimate interests.</h4>
                        <p>Other uses of your information are made for ordinary and transparent purposes which we think are necessary for our legitimate interests as a provider of news, content, and other services (including when working with Our Brands). We use your information on this basis to do the following:</p>
                        <p>(1) Recognise and remember you when you visit our website and better understand how you use our website and others by using cookies to follow your use. </p>
                        <p>(2) Recognise and remember you when you use our app, to analyse how you use it and to serve you with advertisements based on your interests. </p>
                        <p>(3) Identify your interests. We might then put your information in aggregated form into groupings (known as “segments”) by a particular audience, which means we can serve you advertisements and offers that will interest you within the website, including by reference to data we receive from third parties. </p>
                        <p>(4) Keep you updated on any services you have subscribed to, or any products you have purchased, and/or about similar services unless you have told us otherwise (including where we are working alongside other Service Providers to provide these services, such as travel or insurance, as detailed in the Our Brands section);</p>
                        <p>(5) Contact you to let you know about any of our products, services or promotions (which may in some cases be provided by third parties), including by email, mail, telephone, or SMS text message, always having regard to your preferences. </p>
                        <p>(6) Contact you directly via social media in relation to any competitions and/or prize draws you have entered.</p>
                        <p>(7) Make sure materials on the website or in apps are presented in the most effective way for you and your computer or mobile device;</p>
                        <p>(8) Collect and log numeric internet addresses to improve the website and to monitor website usage; and</p>
                        <p>(9) Assess and understand our customers, site users' and account holders' feedback and identify usage hotspots;</p>
                        <h4>2.4 Some limited uses of your data are required to comply with legal obligations, for example fraud detection and taxation;</h4>

                    </div>
                    <div class="privacy_content section_4">
                        <h2>3. How do we gather information?</h2>
                        <h4>3.1 Information is gathered in the following ways:</h4>
                        <p>(1) indirectly (e.g. using website technology that tracks and administers your visits through your browser, or similar technology when you use any of our Apps on a mobile device.</p>
                        <p>(2) through your device (e.g. mobile, PC or tablet) where you have enabled location services for the applicable App or browser. This may be used for location targeted services or advertising in accordance with your preferences, which may be adjusted either on your device or via server, App or website preferences;</p>

                    </div>
                    <div class="privacy_content section_5">
                        <h2>4. How do you decide how you want to hear from us?</h2>
                        <p>4.1 We will contact you in accordance with your preferences, including by email, phone, post and SMS text.  We always seek to explain why and how we might contact you at the point you give your information to us.</p>

                    </div>
                    <div class="privacy_content section_6">
                        <h2>5. Accessing and updating your personal information</h2>
                        <p>5.1 You can update your details and marketing preferences by accessing your account pages on the website.</p>
                        <p>5.2 You have the right to access the personal information held about you from us.</p>

                    </div>
                    <div class="privacy_content section_7">
                        <h2> 6. Cookies and similar technologies</h2>
                        <p>6.1 A cookie is a small piece of information that is placed on your computer when you visit certain websites. When we refer to “cookies” we include other technologies with similar purposes, such as tags and identifiers. Find out more about the use of cookies on http://www.cookiecentral.com/.</p>
                        <p>6.2 We use the following types of cookie, as will your browser:</p>
                        <p>(1) Analytics cookies that remember your computer or mobile device when you visit our website and recognise visits to our website across different devices. They keep track of browsing patterns and help us to build up a profile of how our clients use the website. We use that information for customer analytics and to serve advertisements that we think might be of particular interest to you on our and other websites . Your browser may use similar cookies for similar purposes and to serve advertisements for others.</p>
                        <p>(2) Service cookies that help us to make our website work as efficiently as possible; remember your registration and login details; remember your settings preferences; to detect what device you are using and adapt how we present our services according to the screen size of that device.</p>
                        <p>6.3 We have no access to third party cookies and third party organisations have no access to ours. The third party organisations that place cookies, including your browser (such as Google), data management providers and the third party companies who pay for advertising and analytics services using this information, will have their own privacy policies.</p>

                    </div>
                    <div class="privacy_content section_7">
                        <h2> 7. Managing your cookies preferences</h2>
                        <p>7.1 Most browsers allow you to turn off cookies. To do this look at the “help” menu on your browser. Switching off cookies may restrict your use of the website and/or delay or affect the way in which it operates. We also provide our own cookie management tool for you to make more specific choices about how cookies are used for your visits to our site.</p>

                    </div>
                    <div class="privacy_content section_8">
                        <h2>8. Protecting your information</h2>
                        <p>8.1 The password you provide when registering with the website is encrypted to ensure protection against unauthorised access to your personal information.</p>
                        <p>8.2 We invest in good quality security and do our utmost to protect user privacy. No data transmission over the Internet can be entirely secure, and therefore we cannot guarantee the security of your personal information and/or use of the website. Any information that you send is at your own risk and may be read by others. However once we have received your personal information we use strict procedures to protect the security of your personal information.</p>

                    </div>
                    <div class="privacy_content section_9">
                        <h2>9. Disclosing your information</h2>
                        <p>9.1 Your internet browser or other accounts. Depending on which browser you use to visit our site, and in accordance with your browser cookie preferences (see above), your browser (such as Google) may collect information about you and your visit for its own services, including those services such as segmented or personalised advertising that it provides to us and other sites. </p>
                        <p>9.2 Legal requirements. We may disclose your personal information if we are required to do so by law, or if in good faith we believe such action is necessary to comply with the law as a legal obligation.</p>

                    </div>
                    <div class="privacy_content section_10">
                        <h2>10. Where we store your personal information</h2>
                        <p>10.1 We will only keep your personal information for as long as we need it for a lawful purpose: whether because of the products and services we have provided to you, (and to allow for reasonable retention of records afterwards to reflect legal requirements or limitation periods),or because we believe you still wish to hear from us. </p>

                    </div>
                    <div class="privacy_content section_11">
                        <h2>11. Changes to this Policy</h2>
                        <p>11.1 If we change our Policy, we will post the changes on this page. Please check the website regularly for any changes to this Policy. </p>

                    </div>
                    <div class="privacy_content section_12">
                        <h2>12. If you don't feel we're adhering to this Policy, what should you do?</h2>
                        <h4>12.1 You have the following rights:</h4>
                        <p>(1)  To obtain access to, and copies of, the personal data that we hold about you, or require that it is transmitted to another data controller;</p>
                        <p>(2)  To request that we restrict our data processing activities or cease processing your personal data in certain ways, for example because you do not consider it lawful;</p>
                        <p>(3)  To require us not to send you marketing communications;</p>
                        <p>(4)  To withdraw your consent, where we are relying on it to process your personal data;</p>
                        <p>(5)  To object to how we process your personal data, in particular where we are relying on our legitimate interests; and</p>
                        <p>(6)  To ask us to erase the personal data we hold about you, for example because it is causing you distress or you believe it to be no longer relevant, or to correct the information if it is incorrect.</p>
                        <p>Please note that the above rights are not absolute, and we will be entitled to refuse requests where exceptions apply.</p>
                        <p style="font-style: italic;" class="lead">This Policy was last updated on 18th May, 2020</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- section end-->

@endsection
