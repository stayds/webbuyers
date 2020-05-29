@extends('admin.layout.master')


@section('bulk')


    <header id="topnav">

        @include('admin.partials.toplink')

        @include('admin.partials.adminnav')

    </header>

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.list')}}">Admin Users</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">Profile</h4>
                        <form action="{{route('admin.update')}}" method="POST" >
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
                                    <label for="fname" class="col-form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" value="{{$user->fname}}" name="fname" required>
                                    @error('fname')
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                         </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lname" class="col-form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" value="{{$user->lname}}" name="lname" required>
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="col-form-label">Email (Disabled)</label>
                                    <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>
                                    @error('email')
                                         <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword1" class="col-form-label">Phone</label>
                                    <input type="phone" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required placeholder="Phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword" class="col-form-label">Address</label>
                                    <input type="text" class="form-control" id="address" value="{{ $user->address }}" name="address"  placeholder="Enter Address" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-4 pt-4">
                                    <button class="btn btn-success btn-block" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('footer')

    @include('admin.partials.masterscripts')

 @endsection
