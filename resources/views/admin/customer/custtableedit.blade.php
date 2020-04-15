<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead>
        <tr>
            <th>#S/N</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Location</th>
            <th>Date joined</th>
            <th>View Orders</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 0 ?>
        @forelse($users as $user)

            <tr>
                <td>{{++$count}}</td>
                <td class="text-capitalize">{{$user->userprofile->fname}}</td>
                <td class="text-capitalize">{{$user->userprofile->lname}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->state->statename}}</td>
                <td>{{$user->userprofile->getFormattedDateAttribute()}}</td>
                <td>
                    <a href="{{route('admin.customer.order', $user->userid)}}" class="btn btn-success btn-xs">
                        <i class="fa fa-street-view"></i>
                    </a>
                </td>
                <td>

                    @if($user->user->status > 0)
                        <a href="{{route('admin.customer.disable', $user->userid)}}" id="custdisable" class="btn btn-danger btn-xs">
                            <i class="fa fa-ban"></i> Disable
                        </a>
                    @else
                        <a href="{{route('admin.customer.disable', $user->userid)}}" id="custdisable" class="btn btn-primary btn-xs">
                            <i class="fa fa-check"></i> Enable
                        </a>
                    @endif
                </td>
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
