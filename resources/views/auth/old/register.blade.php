@extends('layouts.master')

@section('content')
    <div class="customer_login mt-60">
            <div class="container">
                <div class="signup-cont">

                    <div class="login-html">
                        <h3 style="text-transform: uppercase; text-align: center;">{{ __('Sign up to Join') }}</h3>
                        <form method="POST" action="{{ route('register') }}">

                            <div class="login-form">
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
                                <input type="hidden" name="usertypeid" value="1">
                                <input type="hidden" name="regmodeid" value="2">

                                <div class="group">
                                    <label for="fname" class="col-md-12 col-form-label label">{{ __('First name') }}</label>
                                    <input id="fname" type="text" class="input @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required>

                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label for="name" class="col-md-12 col-form-label label">{{ __('Last name') }}</label>
                                    <input id="lname" type="text" class="input @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required >

                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label for="email" class="col-md-12 col-form-label label">{{ __('Email Address') }}</label>
                                    <input id="email" type="text" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label for="phone" class="col-md-12 col-form-label label">{{ __('Phone') }}</label>
                                    <input id="phone" type="text" class="input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required >

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label for="stateid" class="col-md-12 col-form-label label">{{ __('Location') }}</label>
                                    <select id="stateid" name="stateid" class="input" required>
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
                                <div class="group">
                                    <label for="pass" class="col-md-12 col-form-label label">{{ __('Password') }} <span class="text-danger"> (minimum of 8)</span></label>
                                    <input id="pass" type="password" data-type="password" class="input @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label for="password-confirm" class="col-md-12 col-form-label label">{{ __('Confirm Password') }} <span class="text-danger"> (minimum of 8)</span></label>
                                    <input id="password-confirm" type="password" class="input" data-type="password" name="password_confirmation" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

@endsection
