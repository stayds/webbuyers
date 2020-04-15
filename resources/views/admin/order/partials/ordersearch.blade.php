<form action="{{route('list.orders')}}" id="formfilter">
<div class="row">
        <div class="col-12" id="errmsg"></div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Show</label>
                <select class="form-control" name="def" id="exampleFormControlSelect1" required>
                    <option selected value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Sort by</label>
                <select class="form-control" name="sort" id="exampleFormControlSelect1" required>
                    <option selected value="1">Delivered</option>
                    <option value="2">Pending</option>
                    <option value="3">Processing</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label class="control-label col-sm-6">Start Date</label>
            <label class="control-label col-sm-6 pull-right">End Date</label>

            <div class="col-sm-12">
                <div class="input-daterange input-group" id="date-range">
                    <input type="date" id="start" class="form-control" name="start" value="{{old('start')}}" required  placeholder="Start Date"/>
                    <input type="date" id="end" class="form-control" name="end" value="{{ old('end') }}" required placeholder="End Date"/>
                </div>
            </div>
        </div>
        <div class="col-md-2 mt-3">
            <button class="btn btn-rounded btn-secondary btn-block" type="submit" id="filter">Filter</button>
        </div>

</div>
</form>

