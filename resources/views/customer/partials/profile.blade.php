<h4 class="text-uppercase text-md-center font-weight-bold">Account details </h4>
<div class="row">
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                Personal Information
            </div>
            <div class="card-body">
                <h5 class="card-title text-capitalize">{{$user->userprofile->fullname() }}</h5>
                <div class="card-text">
                    {{$user->email}}<br>
                    {{$user->phone}}<br>
                    {{($user->userprofile->address)?$user->userprofile->address : 'No Contact Address added'}}<br>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#perModal">Edit <i class="fa fa-edit"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                Address
            </div>
            <div class="card-body">
                <h5 class="card-title">Delivery Address</h5>
                <div class="card-text">
                    {{ ($billing) ? $billing->address : 'No Billing Address'}}<br>
                    {{ ($billing) ? $billstate->statename : 'No Billing State'}}
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#AddModal">Edit <i class="fa fa-edit"></i></a>
            </div>
        </div>
    </div>
</div>

@include('customer.partials.editprofile')

@include('customer.partials.editaddress')

