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
                            <li>Contact us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact map start-->
    <div class="contact_map mt-60">

    </div>
    <!--contact map end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>contact us</h3>
                         <p>We are always looking forward to hearing from our customers.</p>
                        <ul>
                            <li><i class="fa fa-home"></i>   No 7 Parakou Crescent, Wuse 2, FCT - Abuja</li>
                            <li><i class="fa fa-home"></i>   215 Konoko Crescent, Wuse 2, FCT - Abuja</li>
                            <li><i class="fa fa-envelope-o"></i> <a href="mailto:contact@bulkbuyersconnect.com">contact@bulkbuyersconnect.com</a></li>
                            <li><i class="fa fa-phone"></i> 0809 975 5559 (Mon - Sat :: 9am - 5pm Nigerian time)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message form" style="background: #f9f9f9; padding: 4%;">
                        <h3>Send us a message</h3>
                        <form method="POST"  action="{{route('home.contact.post')}}">
                            @csrf
                            @if ($message = Session::get('success'))

                    <div class="alert alert-success alert-block">

                        <button type="button" class="close btn btn-sm" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="border-top:0 !important">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p>
                               <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text" value="{{ old('name') }}" required>
                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </p>
                            <p>
                               <label>  Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email" value="{{ old('email') }}" required>
                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </p>
                            <p>
                               <label>  Subject</label>
                                <input name="subject" placeholder="Subject *" value="{{ old('subject') }}" type="text" required>
                                @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </p>
                            <div class="contact_textarea">
                                <label>  Your Message</label>
                                <textarea placeholder="Message *" required name="msgcontent" value="{{ old('msgcontent') }}"  class="form-control2" ></textarea>
                                @error('msgcontent')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <button type="submit"> Send</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


