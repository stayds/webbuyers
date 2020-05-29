<h4 class="text-md-right text-uppercase font-weight-bold ">Order Details</h4>
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Product</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Unit Price (&#8358;)</th>
            <th>Total Price (&#8358;)</th>
        </tr>
        </thead>
        <tbody>

        @forelse($details as $key => $list)
            <tr>
                <td>{{ $key + $details->firstItem() }}</td>
                <td class="text-capitalize">
                    <span class="success">{{$list->product->productname}}
                    </span>
                </td>
                <td class="text-capitalize">{{$list->product->description}} </td>
                <td class="text-capitalize">{{$list->quantity}} </td>
                <td>{{number_format($list->unitprice)}} </td>
                <td>{{number_format($list->totalprice)}} </td>
            </tr>
        @empty
            <tr><div class="text-center text-danger">No Record exist at the moment</div></tr>
        @endforelse
        </tbody>
    </table>
</div>

