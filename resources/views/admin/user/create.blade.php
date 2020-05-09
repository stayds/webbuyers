
<div class="row">

    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Add new user</h4>
            <form action="{{route('admin.create')}}" method="POST">
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
                        <label for="passord" class="col-form-label">Enter Phone</label>
                        <input type="phone" class="form-control" id="phone"  name="phone" value="{{ old('phone') }}"  required placeholder="Enter Phone Number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="role" class="col-form-label">Select Role</label>
                        <select class="form-control" name="role" required>
                            <option value="">Select Role</option>
                            @foreach($role as $list)
                                <option class="text-capitalize" value="{{$list->id}}"> {{$list->name}} </option>
                            @endforeach
                        </select>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 pt-4">
                        <button class="btn btn-success btn-block" type="submit">Add user</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
