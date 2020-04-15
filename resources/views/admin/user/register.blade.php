@extends('admin.layout.master')

@section('bulk')

    <div class="wrapper">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item active">Admin Users</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin Users</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">Add new user</h4>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <input type="hidden" name="usertypeid" value="3">
                            <input type="hidden" name="regmodeid" value="2">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="fname" class="col-form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="{{ old('fname') }}" placeholder="First Name" required>
                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lname" class="col-form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required>
                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="col-form-label">Email address</label>
                                    <input type="email" class="form-control" id="email"  name="email" value="{{ old('email') }}"  required placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="passord" class="col-form-label">Create Password</label>
                                    <input type="password" class="form-control" id="password"  name="email" value="{{ old('password') }}"  required placeholder="Enter Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required  placeholder="Confirm Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 pt-4">
                                    <button class="btn btn-success btn-block" type="button">Add user</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">

                        <h4 class="header-title mt-0 mb-3">View all users</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First name</th>
                                    <th>Second name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Super</td>
                                    <td>Admin</td>
                                    <td>admin@bulkbuyersconnect.com</td>
                                    <td>Super Admin</td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Dayo</td>
                                    <td>Benjamin</td>
                                    <td>dayo@bulkbuyersconnect.com</td>
                                    <td>Admin</td>
                                    <td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-close" id="sa-params"></i></a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
