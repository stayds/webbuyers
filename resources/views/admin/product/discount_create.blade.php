<div class="row">

    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Add New Discount Code</h4>
            <form action="{{route('post.product.discount')}}" method="POST">
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
                        <label for="code" class="col-form-label">Code</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" placeholder="Discount Code" required>
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group col-md-4">
                        <label for="percent" class="col-form-label">Percentage %</label>
                        <input type="text" class="form-control" id="percent" name="percent" value="{{ old('percent') }}" placeholder="Percentage" required>
                        @error('percent')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group col-md-4">
                        <label for="use" class="col-form-label">Usage per customer</label>
                        <input type="number" class="form-control" id="use"  name="use" value="{{ old('use') }}"  required placeholder="How many times">
                        @error('use')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 pt-4 col-offset-8">
                        <button class="btn btn-success btn-block" type="submit">Add Discount</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
