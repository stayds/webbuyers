
<div class="clearfix">
        <div class="float-left mt-3">
            <h2>Procurement List</h2>
            <h3 class="font-weight-light">Duration: [{{$rawstart}} - {{$rawend}}]</h3>
        </div>
        <div class="d-print-none">
            <div class="float-right">
                <button id="genp" type="button" class="btn btn-dark waves-effect waves-light btn-lg mr-2"><i class="fa fa-print"></i> PRINT</button>
                <a href="#" class="btn btn-primary waves-effect waves-light btn-lg">PDF</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

<div class="table-responsive">
    <table class="table mt-1" id="prolist">
        <thead>
        <tr><th>#</th>
            <th>Product</th>
            <th>Description</th>
            <th>Total Quantity</th>
        </tr></thead>
        <tbody>
        <?php $count = 0 ?>
        @forelse($procure as $list)
            <tr>
                <td>{{++$count}}</td>
                <td>{{$list->product->productname}}</td>
                <td>{{$list->product->description}}</td>
                <td class="text-center">{{$list->quantity}}</td>
            </tr>
        @empty
            <tr><td colspan="7"><div class="alert alert-danger text-center"> No record exists </div> </td></tr>
        @endforelse

        </tbody>
    </table>
</div>
