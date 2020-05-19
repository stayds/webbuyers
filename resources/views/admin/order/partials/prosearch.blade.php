
    <form action="{{route('procure.list')}}" id="formfilter" class="mt-3 no-print">
        <div class="row">
            <div class="col-12" id="errmsg"></div>
            <div class="col-10">
                <label class="control-label col-sm-6">Start Date</label>
                <label class="control-label col-sm-6 pull-right">End Date</label>

                <div class="col-12">
                    <div class="input-daterange input-group" id="date-range">
                        <input type="date" id="start" class="form-control" name="start" value="{{old('start')}}" required  placeholder="Start Date"/>
                        <input type="date" id="end" class="form-control" name="end" value="{{ old('end') }}" required placeholder="End Date"/>
                    </div>

                </div>

            </div>
            <div class="col-2 mt-3">
                <button class="btn btn-rounded btn-secondary btn-block" type="submit" id="filter">Filter</button>
            </div>
        </div>
    </form>

