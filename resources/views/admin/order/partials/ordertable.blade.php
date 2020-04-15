
    <div class="table-responsive">
        <button class="btn btn-light text-danger" id="printing"><i class="fa fa-print"></i> </button>
        <div id="prints">
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
                        <th>Payment</th>
                        <th>Ordered by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $list)

                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $list->orderrefno }}</td>
                            <td>&#8358;{{number_format($list->totalcost)}}</td>
                            <td>{{$list->getFormattedDateAttribute()}}</td>
                            <td><span class="text-capitalize btn {{$list->orderstatus->ordcolor }} btn-sm ">{{ $list->orderstatus->ordstatname }}</span></td>
                            <td>
                                {{-- $stat = $list->payment->paymentstatus->paymentstatus--}}
                                <span class="text-capitalize font-weight-bold text-danger">
                                    {{$list->payment->paymentstatus->paymentstatus}}
                                </span>
                            </td>
                            <td>{{ $list->user->userprofile->fullname() }}</td>
                            <td>

                                @if($list->orderstatid === 1)
                                    <span class="text-primary">Order has been Delivered</span>
                                    @elseif($list->orderstatid === 3)
                                    <span class="text-primary">Order is been Processed</span>
                                 @else
                                    <a id="pending" href="{{route('list.orders.update.pending')}}" data-id="{{$list->orderid}}" class="btn btn-lighten-danger btn-sm"><i class="fa fa-arrow-circle-o-right"></i> Set to Processing</a>
                                 @endif
                            </td>
                            <td><a href="{{ route('list.orders.details', ['id'=>$list->orderid]) }}" class="btn btn-success btn-xs" ><i class="fa fa-search"></i></a></td>
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
        </div>
        <nav>
            <div class="m-b-0 mt-2 justify-content-center">
                {{$orders->links()}}
            </div>

        </nav>
    </div>
