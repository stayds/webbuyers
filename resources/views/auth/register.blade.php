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
                                <h1 >Signup</h1>
                                <div class="stripe-bottom"></div>
                            </div>
                        </div>
                        <form action="{{route('register')}}" method="POST" name="registration">
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
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text"  name="fname" class="form-control" value="{{ old('fname') }}" required aria-describedby="emailHelp">
                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text"  name="lname" class="form-control" value="{{ old('lname') }}" required>
                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" value="{{ old('email') }}" required class="form-control">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}" required class="form-control">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location</label>
                                <select id="stateid" name="stateid" class="form-control" required>
                                    @foreach ($states as $state)
                                        <option selected value="{{$state->stateid}}">{{$state->statename}}</option>
                                    @endforeach
                                </select>
                                @error('stateid')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password <span class="text-danger"> (minimum of 8)</span></label>
                                <input type="password" name="password" required class="form-control">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password <span class="text-danger"> (minimum of 8)</span></label>
                                <input type="password" name="password_confirmation" id="password" required  class="form-control" aria-describedby="emailHelp">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-md-12 text-center mb-3 mt-4">
                                <button type="submit" class=" btn btn-block mybtn btn-login tx-tfm btn-lg">Get Started For Free</button>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <p class="text-center"><a href="{{route('login')}}" id="signin">Already have an account?</a></p>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->



@endsection
