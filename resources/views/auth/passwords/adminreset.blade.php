@extends('admin.layout.plain')

@section('bulk')

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="{{route('admin.login')}}">
                            <span><img src="{{asset('admin/images/logo-dark.png')}}" alt="" height="50"></span>
                        </a>
                        <p class="text-muted mt-2"></p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0 mb-3">Reset Password</h4>
{{--                                <p class="text-muted mb-0 font-13">Enter your email address and an email will be sent to you with instructions to reset your password.  </p>--}}
                            </div>

                            <form action="{{ route('admin.reset.post') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label for="email">Email address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required placeholder="Enter your email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror

                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">New Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror

                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">


                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">
                                        {{ __('Reset Password') }}
                                    </button>                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{route('admin.login')}}" class="ml-1"><b>Log in</b></a></p>
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
