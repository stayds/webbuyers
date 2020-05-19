<html>
<head>
    <title>Customer list </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
 <body>
 <div class="wrapper">
     <div class="container-fluid">
         <div class="col-xl-12">
             <div class="card-box">
                 <h4 class="text-center font-weight-bold">List of Registered Customer</h4>
                 <div class="table-responsive">
                     <table class="table table-hover mb-0" id="customer">
                         <thead>
                         <tr>
                             <th>#</th>
                             <th>Full name</th>
                             <th>Phone</th>
                             <th>Email</th>
                             <th>Location</th>
                             <th>Date joined</th>
                             {{--                                <td>View Order(s)</td>--}}
                             {{--                                <th></th>--}}
                         </tr>
                         </thead>
                         <tbody>
                         <?php $count = 0 ?>
                         @forelse($usere as $key=> $user)
                             <tr>
                                 <td>{{ ++$count }}</td>
                                 <td class="text-capitalize">{{$user->fullname()}}</td>
                                 <td>{{$user->user->phone}}</td>
                                 <td>{{$user->user->email}}</td>
                                 <td>{{$user->state->statename}}</td>
                                 <td>{{$user->getFormattedDateAttribute()}}</td>
                             </tr>
                         @empty
                             <tr><div class="text-danger text-center text-capitalize font-weight-bold font-15">
                                     No customer record exist
                                 </div>
                             </tr>
                         @endforelse
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </body>
</html>


