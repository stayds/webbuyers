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
                                <li class="breadcrumb-item active">Discount</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Discount Code</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            @include('admin.product.discount_create')

            <div class="row">

                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">View all Codes</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Percentage</th>
                                    <th>Usage Per Customer</th>
                                    <th>Date Created</th>
                                    <th></th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php $count=0 ?>
                                    @forelse($list as $item)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td class="text-capitalize">{{$item->code}}</td>
                                            <td class="text-capitalize">{{$item->percent}}</td>
                                            <td>{{$item->use}}</td>
                                            <td>{{$item->getFormattedDateAttribute()}}</td>
                                            <td>
                                                @if($item->status > 0)
                                                    <a href="{{route('update.discount.status',$item->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-close" id="sa-params"></i> Disable</a>
                                                @else
                                                    <a href="{{route('update.discount.status',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-check-circle" id="sa-params"></i> Enable</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                            <tr><div class="text-center text-danger font-weight-bold font-18"> No Record Exists</div></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    @include('admin.partials.dashscripts')

@endsection

