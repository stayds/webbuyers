<html>
<head>
    <title>Customer list </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="clearfix">
    <div class="float-left mt-3">
        <h2>Procurement List</h2>
        <h3 class="font-weight-light">Duration: [{{$rawstart}} - {{$rawend}}]</h3>
    </div>

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
        @foreach($procure as $list)
            <tr>
                <td>{{++$count}}</td>
                <td>{{$list->productname}}</td>
                <td>{{$list->description}}</td>
                <td class="text-center">{{$list->quantity}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</body>
</html>
