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
                                <li class="breadcrumb-item active"><a href="{{route('list.product')}}">All Products</a></li>
                                <li class="breadcrumb-item active">Edit/View product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit/View Product</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-8">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Product Information</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{route('edit.product.post',['id'=>$detail->productid])}}">
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
                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label" for="simpleinput">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="productname" name="productname" class="form-control" value="{{$detail->productname}}">
                                                @error('productname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label" for="example-placeholder">Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="description" class="form-control" required name="description" value="{{$detail->description}}">
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="prodcatid" required>
                                                    <option>Select</option>
                                                    @foreach($category as $list)
                                                        <option class="text-capitalize" value="{{$list->prodcatid}}"  @if($detail->prodcatid == $list->prodcatid)selected @endif>{{$list->prodcatname}}</option>
                                                     @endforeach
                                                </select>
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label class="col-sm-2  col-form-label" for="example-fileinput">Product image</label>--}}
{{--                                            <div class="col-sm-10">--}}
{{--                                                <img src="{{asset($detail->productimg)}}" width="200" class="img-fluid rounded-circle img-thumbnail">--}}
{{--                                                <h4>Change Image</h4>--}}
{{--                                                <input type="file" class="form-control" id="productimg" name="productimg">--}}
{{--                                                @error('productimg')--}}
{{--                                                    <span class="invalid-feedback" role="alert">--}}
{{--                                                        <strong>{{ $message }}</strong>--}}
{{--                                                    </span>--}}
{{--                                                @enderror--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label" for="example-number">Price</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">NGN</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="price" value="{{$detail->price}}" aria-label="price" required aria-describedby="basic-addon1">
                                                </div>
                                                @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-md-10">
                                                <label>Disable</label>
                                                <input type="radio" disabled name="status" value="0" @if(!$detail->status)checked @endif data-plugin="switchery" data-color="#00b19d" data-size="large" />
                                                <b>Enable</b>
                                                <input type="radio" disabled value="1" name="status" @if($detail->status)checked @endif data-plugin="switchery" data-color="#00b19d" data-size="large" />

                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <button class="btn btn-success btn-rounded btn-lg">Save Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Update Product Image</h4>

                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{route('edit.product.post',['id'=>$detail->productid])}}">
                                        @csrf
                                        <input type="hidden" name="productid" value="{{$detail->productid}}">
                                        @if ($message = Session::get('successs'))

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


                                        <div class="form-group row">

                                            <div class="col-sm-10">
                                                <img src="{{asset($detail->productimg)}}" width="120" class="img-fluid rounded-circle img-thumbnail">
                                                <h4>Change Image</h4>
                                                <input type="file" class="form-control" id="productimg" name="productimg">
                                                @error('productimg')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <button class="btn btn-success btn-rounded btn-lg">Update Image</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
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
