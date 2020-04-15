<div class="table-responsive">
    <table class="table table-hover mb-0">
        @if($orders)
            <?php $count = 0; ?>
            <thead>
            <tr>
                <th>#</th>
                <th>Order Reference</th>
                <th>Total Cost</th>
                <th>Date added</th>
                <th>Status</th>
                <th>Ordered by</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $list)
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $list->orderrefno }}</td>
                    <td>{{$list->totalcost}}</td>
                    <td>{{$list->getFormattedDateAttribute()}}</td>
                    <td><span class="badge badge-info">{{ $list->orderstatus->ordstatname }}</span></td>
                    <td>{{ $list->user->userprofile->fullname() }}</td>
                    <td>
                        @if($list->orderstatid > 1)
                            <a id="updorder"  class="btn btn-warning btn-xs" data-ref="{{ $list->orderrefno }}" data-id="{{$list->orderid}}" href="{{route('list.orders.update')}}"> Set to Delivered</a> &nbsp;
                            @else
                            <span class="text-success ">Order has been Delivered</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="7"><div class="alert alert-danger text-center"> No record exists </div> </td></tr>
            @endforelse

            </tbody>
        @else
            <tr>
                <td><div class="text-danger text-center text-capitalize"> No order exist at the moment </div> </td>
            </tr>
        @endif
    </table>
    <nav>
        <div class="m-b-0 mt-2 justify-content-center">

        </div>

    </nav>
</div>

<script>



</script>
