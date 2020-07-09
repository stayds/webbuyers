<div class="table-responsive">
    <table class="table table-hover mb-0" id="customer">
        <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Location</th>
            <th>Date joined</th>
            <td>View Order(s)</td>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0 ?>
         @forelse($users as $key=> $user)
            <tr>
                <td>{{ $key + $users->firstItem() }}</td>
                <td class="text-capitalize">{{$user->fname}}</td>
                <td class="text-capitalize">{{$user->lname}}</td>
                <td>{{$user->user->phone}}</td>
                <td>{{$user->user->email}}</td>
                <td style="width: 100px">{{$user->state->statename}}</td>
                <td>{{$user->getFormattedDateAttribute()}}</td>

                <td>
                    <a href="{{route('admin.customer.order', $user->userid)}}" class="btn btn-success btn-xs">
                        {{-- <i class="fa fa-eye"></i>  --}}
                    View Orders</a>
                </td>
                @if(Auth::guard('admin')->user()->adminrole->roleid != 2)
                <td>

                    @if($user->user->status > 0)
                        <a href="{{route('admin.customer.disable', $user->userid)}}" id="custdisable" class="btn btn-danger btn-xs">
                            {{-- <i class="fa fa-ban"></i>  --}}
                        Disable</a>
                    @else
                        <a href="{{route('admin.customer.disable', $user->userid)}}" id="custdisable" class="btn btn-primary btn-xs">
                            {{-- <i class="fa fa-check"></i>  --}}
                        Enable</a>
                    @endif
                </td>
                    @endif
            </tr>
             @empty
                <tr><div class="text-danger text-center text-capitalize font-weight-bold font-15">
                        No customer record exist
                    </div>
                </tr>
         @endforelse
        </tbody>
    </table>
    <div style="align-content: center; margin-top: 30px" align="center" class="text-center"> {{ $users->links() }}</div>
</div>
