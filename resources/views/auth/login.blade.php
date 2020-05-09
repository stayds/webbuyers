@extends('layouts.master')


@section('content')

    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div>
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Login</h1>
                                <div class="stripe-bottom"></div>
                            </div>
                        </div>
                        <form action="{{ route('login') }}" method="post" name="login">
                            @csrf
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email"  class="form-control" value="{{ old('email') }}" required placeholder="Enter email">
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}"  class="form-control" placeholder="Enter Password">
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror

                            <div class="col-md-12 text-center">
                                <button type="submit" class=" btn btn-block mybtn btn-login tx-tfm btn-lg">Login</button>
                            </div>
                            <div style="height: 20px;"></div>
                            <div class="form-group">
                                <p class="text-center"><a href="{{route('pass.forgot')}}">I forgot my password</a></p>
                            </div>
                            <div class="form-group">
                                <p class="text-center">Don't have account? <a href="{{route('register')}}" id="signup">Sign up here</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->



    @endsection
