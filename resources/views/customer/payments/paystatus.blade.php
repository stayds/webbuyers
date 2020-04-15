@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form method="POST" action="/paystatus">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        @error('email') <div style="color: red"> {{$message}}</div> @enderror
                        <input type="email" class="form-control @error('title') is-invalid @enderror " name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        @error('email') <div style="color: red"> {{$message}}</div> @enderror
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>


@endsection
