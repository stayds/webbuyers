@extends('admin.layout.plain')

@section('bulk')
    <div class="home-btn d-none d-sm-block">
        <a href="{{route('get.login')}}"><i class="fas fa-home h2 text-dark"></i></a>
    </div>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="{{route('admin.login')}}">
                            <span><img src="{{asset('admin/images/logo-dark.png')}}" alt="" height="50"></span>
                        </a>
                        <p class="text-muted mt-2 mb-4">Bulk Buyers Connect Admin</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0 mb-3">Forgotten Password</h4>
                                <p class="text-muted mb-0 font-13">Enter your email address and an email will be sent to you with instructions to reset your password.  </p>
                            </div>

                            <form action="{{route('admin.forgot.post')}}" method="POST" id="adminform">
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
                                <div class="form-group mb-3">
                                    <label for="email">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror

                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-dark btn-block btn-rounded" id="adminfor" type="submit"> Reset Password </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{route('get.login')}}" class="ml-1"><b>Log in</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    @endsection

   @section('scripts')

       <script>
           $(function() {
               $('#adminfor').click(function(e){
                   e.preventDefault();
                   let form = $('#adminform');
                   let route = form.attr('action');

                   $.ajax({
                       url:route,
                       method:'POST',
                       data: form.serialize(),
                       success: function(data){
                           console.log(data);

                           if(data){
                               console.log(data);
                               let con = '<div class="alert alert-success">Please check your email for password reset instruction</div>'
                               $('div#info').html(con);
                           }
                       }
                   })

               })
           });



       </script>

   @endsection
