<div class="col-xl-12">
    <div class="card-box">
        <h4 class="header-title mt-0 mb-3">Add new category</h4>
        <form method="POST" action="{{ route('post.category') }}">

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
                    <label for="cname" class="col-form-label">Category Name</label>
                    <input type="text" class="form-control" id="prodcatname" name="prodcatname" value="{{ old('prodcatname') }}" placeholder="Category name" required>
                    @error('prodcatname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="description" class="col-form-label">Description</label>
                    <input type="text" class="form-control"  name="description" id="description" value="{{ old('description') }}" placeholder="Category Description" required>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="status" class="col-form-label">Status</label>
                    <select id="role" class="form-control" name="status" required>
                        <option>Select Status</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button class="btn btn-success btn-rounded btn-lg" type="submit">Add Category</button>
        </form>
    </div>

</div>
