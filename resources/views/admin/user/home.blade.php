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
{{--                                <li class="breadcrumb-item active">Dashboard</li>--}}
                            </ol>
                        </div>

                        <h4 class="page-title">@if(Auth::guard('admin')->user()->adminrole->roleid != 4) Dashboard @endif</h4>
                    </div>
                </div>
            </div>


            @include('admin.partials.dashfigures')

{{--            @include('admin.partials.dashchart')--}}

{{--            @include('admin.partials.dashlist')--}}




        </div>
    </div>

@endsection

@section('footer')

    @include('admin.partials.dashscripts')

@endsection
