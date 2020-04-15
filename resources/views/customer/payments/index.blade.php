<h4 class="text-md-right text-uppercase">Payment History</h4>
<div class="table-responsive">
    <table class="table">
        @if(!$payment)
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Payment Ref</th>
                    <th>Order No</th>
                    <th>Status</th>
                    <th>Amount (&#8358;)</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
        @endif
        <tbody>
            <?php $count = 0 ?>
            @forelse($payment as $list)
                <tr>
                    <td>{{++$count}}</td>
                    <td>{{$list->paymentrefno}}</td>
                    <td>{{$list->orderid}}</td>
                    <td class="text-capitalize"><span class="success">{{$list->paymentstatus->paymentstatus}}</span></td>
                    <td>{{number_format($list->totalcost)}} </td>
                    <td>{{$order->formatted_date}}</td>

                </tr>
            @empty
                <tr><div class=" addmargin40 text-center text-danger font-weight-bold">No Payment Record exist at the moment</div></tr>
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
