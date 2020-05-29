
<div class="clearfix">
        <div class="float-left mt-3">
            <h2>Procurement List</h2>
            <h3 class="font-weight-light">Duration: [{{$rawstart}} - {{$rawend}}]</h3>
        </div>
      @if($procure->count() > 0)
        <div class="d-print-none no-print">
            <div class="float-right">
                <button onclick={window.print()} type="button" class="btn btn-dark waves-effect waves-light btn-lg mr-2"><i class="fa fa-print"></i> PRINT</button>
                <a href="{{route('procure.list.pdf',['start'=>$rawstart,'end'=>$rawend])}}" class="btn btn-primary waves-effect waves-light btn-lg">PDF</a>
            </div>
            <div class="clearfix"></div>
        </div>
          @endif
    </div>

<div class="table-responsive">
    <table class="table mt-1" id="prolist">
        <thead>
        <tr><th>#</th>
            <th>Product</th>
            <th>Description</th>
            <th class="text-center">Total Quantity</th>
        </tr></thead>
        <tbody>
        <?php $count = 0 ?>
        @forelse($procure as $list)
            <tr>
                <td>{{++$count}}</td>
                <td>{{$list->productname}}</td>
                <td>{{$list->description}}</td>
                <td class="text-center">{{$list->quantity}}</td>
            </tr>
        @empty
            <tr><td colspan="7"><div class="alert alert-danger text-center"> No record exists </div> </td></tr>
        @endforelse

        </tbody>
    </table>
</div>
