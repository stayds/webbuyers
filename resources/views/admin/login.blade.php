@extends('admin.layout.admin')

@section('content')

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="text-center">
                        <a href="index.html">
                            <span><img src="{{asset('admin/images/logo-dark.png')}}" alt="" height="50"></span>
                        </a>
                        <p class="text-muted mt-2 mb-4">Bulk Buyers Connect Admin</p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form action="{{route('admin.login')}}" method="POST">
                                @csrf
                                @if($errors->any())
                                    <div class="notification is-danger">
                                        <ul class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                                <li style="list-style: none">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label for="email">Email address</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required id="password" name="password" placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-dark btn-block btn-rounded" type="submit"> Log In </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="{{route('admin.forgot')}}" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>Forgot your password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
