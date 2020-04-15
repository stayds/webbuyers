<h3>Dashboard </h3>
<div class="row">
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Account Details</h4>
            </div>
            <div class="card-body">
                <p class="text-capitalize">{{ $user->userprofile->fullname() }}</p>
                <p>{{$user->email}}</p>
                <p>{{$user->phone}}</p>
{{--                <p><a href="#" class="btn btn-light">Change Password</a>--}}
{{--                    <a href="#" class="btn btn-light">Edit Profile</a>--}}
{{--                </p>--}}
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>My Orders</h4>
            </div>
            <div class="card-body">
                <p>My Orders: <b>{{$orderno->count()}}</b></p>
                <p>Amount Spent: <b>&#8358;{{number_format($totalspent)}}</b> </p>
            </div>
        </div>
    </div>

</div>
