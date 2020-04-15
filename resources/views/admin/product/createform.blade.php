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
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Bulk Buyers Connect</a></li>
                                <li class="breadcrumb-item active"><a href="{{ route('list.product') }}">All Products</a></li>
                                <li class="breadcrumb-item active">Add product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">New Products</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Add new products</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('post.product') }}" enctype="multipart/form-data">
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
                                            <label class="col-sm-2  col-form-label" for="simpleinput">Product Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="productname" class="form-control" name="productname" value="{{ old('productname') }}" placeholder="Product name" required>
                                                @error('productname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label" for="description">Product description</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="description" class="form-control" name="description" value="{{ old('description') }}" placeholder="Description" required>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label">Product category</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="prodcatid" required>
                                                    <option>Select</option>
                                                    @foreach($category as $list)
                                                        <option value="{{$list->prodcatid}}">{{$list->prodcatname}}</option>
                                                    @endforeach
                                                </select>
                                                @error('prodcatid')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label" for="productimg">Product image</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="productimg" name="productimg" required>
                                                @error('productimg')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2  col-form-label" for="example-number">Price</label>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">NGN</span>
                                                    </div>
                                                    <input type="number" name="price" value="{{ old('price') }}" required class="form-control" placeholder="0.00" aria-label="price" aria-describedby="basic-addon1">
                                                    @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-4">
                                            <button type="submit" class="btn btn-success btn-rounded">Add Product</button>
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

    @include('admin.partials.dashscripts')

@endsection
