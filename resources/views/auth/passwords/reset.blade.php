@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-cont addmargin50">
                <div class="login-html">
                    <div class="text-md-right text-uppercase font-weight-bold text-orange">{{ __('Reset Password') }}</div>

                    <div class="login-form">
                    <form method="POST" action="{{ route('password.update') }}">
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

                        <div class="group">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="group">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="group">
                            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">

                        </div>

                        <div class="group">
                            <button type="submit" class="button buttonstyle">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
