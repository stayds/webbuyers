@extends('admin.layout.master')


@section('bulk')

    <header id="topnav">

        @include('admin.partials.toplink')

        @include('admin.partials.adminnav')

    </header>

    <div class="wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.list')}}">Admin Users</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin Profile</h4>
                    </div>
                </div>
            </div>

            <div class="row">

        <div class="col-xl-12">
            <div class="card-box">
                <h4 class="header-title mt-0 mb-3">Change Password</h4>
                <form action="{{route('post.password.change')}}" method="POST">
                    @csrf
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="password" class="col-form-label">Enter Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lname" class="col-form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation"  placeholder="Confirm Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 pt-4">
                            <button class="btn btn-success btn-block" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- end col -->

    </div>
        </div>
    </div>


@endsection


@section('footer')

    @include('admin.partials.masterscripts')

    @endsection
