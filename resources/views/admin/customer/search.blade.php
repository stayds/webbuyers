<form action="{{route('admin.customer.list')}}" method="POST" id="customer">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Show</label>
                <select class="form-control" id="paginate" name="paginate" data-href="{{route('admin.customer.list')}}">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Search by</label>
                <select class="form-control" id="exampleFormControlSelect1" name="option">
                    <option value="fname">First name</option>
                    <option value="lname">Last name</option>
                    <option value="phone">Phone</option>
                    <option value="email">Email</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlSelect1">Enter Detail</label>
            <input type="text" id="detail" name="detail" class="form-control" placeholder="Search by names or Location">
        </div>
        <div class="col-md-2 mt-3">
            <button href="#" id="custsearch" class="btn btn-rounded btn-success btn-block mt-1">Search</button>
        </div>
    </div>
</form>
