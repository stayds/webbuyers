@extends('layouts.master')

@section('content')

    <div class="customer_login mt-60">
        <div class="container">
            <div class="login-cont">
                <div class="login-html">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                    <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"></label>
                    <div class="login-form">

                            <div class="sign-in-htm">
                                <form method="POST" action="{{ route('login') }}">
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

                                    <div class="group">
                                        <label for="email" class="label">{{__('Email')}}</label>
                                        <input id="email" type="text" class="input" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="group">
                                        <label for="password" class="label">{{__('Password')}}</label>
                                        <input id="password" type="password" class="input" data-type="password" name="password" value="{{ old('password') }}" required autofocus>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="group">
                                        <input type="submit" class="button" value="Sign In">
                                    </div>
                                    <p class="text-center"><a href="{{route('register')}}">No Account? You can register here.</a></p>
                                    <p class="text-center"><a class=" text-danger" href="{{route('pass.forgot')}}">Forgotten Password? Click here.</a></p>
                                    <div class="hr"></div>
                                </form>
                            </div>
{{--                            <div class="for-pwd-htm">--}}
{{--                                --}}{{-- <form action="{{route('password.email')}}" method="POST" id="resetf"> --}}
{{--                                <form action="{{route('pass.reset')}}" method="POST" id="resetf">--}}
{{--                                    @csrf--}}
{{--                                    <div id="info">--}}
{{--                                    @if (count($errors) > 0)--}}
{{--                                        <div class="alert alert-danger">--}}
{{--                                            <ul>--}}
{{--                                                @foreach ($errors->all() as $error)--}}
{{--                                                    <li>{{ $error }}</li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    </div>--}}
{{--                                        <div class="group">--}}
{{--                                            <label for="user" class="label">Email</label>--}}
{{--                                            <input id="resetu" name="email" type="email" class="input" value="{{ old('email') }}" required>--}}

{{--                                            @error('email')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @enderror--}}

{{--                                        </div>--}}
{{--                                        <div class="group">--}}
{{--                                            <input type="submit" id="resetb" class="button" value="Reset Password">--}}
{{--                                        </div>--}}
{{--                                        <p class="text-center"> A password reset link will be sent to your registered email.</p>--}}
{{--                                        <div class="hr"></div>--}}

{{--                                </form>--}}
{{--                            </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


