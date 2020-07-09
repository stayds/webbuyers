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
                                <li class="breadcrumb-item active">Admin Users</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin Users</h4>
                    </div>
                </div>
            </div>

            @include('admin.user.create')

            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">View all users</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Second name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date Created</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $count=0 ?>
                                    @forelse($list as $item)
                                        <tr>
                                            <td class="text-capitalize">{{$item->fname}}</td>
                                            <td class="text-capitalize">{{$item->lname}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->getFormattedDateAttribute()}}</td>
                                            <td class="text-capitalize">{{$item->adminrole->role->name}}</td>
                                            <td>
                                                @if($item->status > 0)
                                                    <a href="{{route('admin.disable',$item->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-close" id="sa-params"></i> Disable</a>
                                                @else
                                                    <a href="{{route('admin.disable',$item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-check-circle" id="sa-params"></i> Enable</a>
                                                @endif
                                                    <a href="{{route('admin.delete',$item->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-check-circle" id="sa-params"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr><div class="text-center text-danger font-weight-bold font-18"> No Record Exists</div></tr>
                                    @endforelse
                                </tbody>
                            </table>
                             <br>
                             {{ $list->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('footer')

     @include('admin.partials.masterscripts')
   @endsection
