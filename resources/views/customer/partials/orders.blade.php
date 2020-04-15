<h4 class="text-uppercase text-md-right font-weight-bold">Orders</h4>
<div class="table-responsive">
    <table class="table">
        @if($orders)
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Ref. No</th>
                    <th>Total (&#8358;)</th>
                    {{-- <th>Payment</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
        @endif
        <tbody>
           <?php $count = 0 ?>
          @forelse($orders as $order)
                <tr>
                    <td>{{++$count}}</td>
                    <td>{{$order->formatted_date}}</td>
                    <td class="text-capitalize"><span class="btn {{$order->orderstatus->ordcolor}} btn-sm text-white">{{($order->ispaid < 1)?'Incomplete': $order->orderstatus->ordstatname }}</span></td>
                    <td>{{$order->orderrefno}} </td>
                    <td>{{number_format($order->totalcost)}} </td>
                    {{-- <td class="text-capitalize">{{($order->payment) ? $order->payment->paymentstatus->paymentstatus :'null'}} </td> --}}

                    <td>
                        @if(!$order->ispaid)
                        <a id="" href="{{route('cart.check.out', $order->orderid)}}" class="text-white btn btn-danger btn-sm view">Pay</a>
                        @endif
                    </td>

                </tr>
          @empty
                <tr><div class="text-center text-danger font-weight-bold addmargin40 font-18 text-capitalize">No Order Record exist at the moment</div></tr>
          @endforelse
        </tbody>
    </table>
</div>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function ajaxcall(url){
            $.ajax({
                url: url,
                method: 'GET',
                success: function (data) {
                    $('#content').html(data);
                }
            })
        }

        $('.orderdetail').click(function(e){
            e.preventDefault();
            url = $(this).attr('href');
            ajaxcall(url);
        });

    })
</script>
