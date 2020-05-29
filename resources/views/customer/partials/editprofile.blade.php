<div class="modal fade" id="perModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personal</h5>
            </div>
            <div class="modal-body">
                <div id="edit">

                </div>
                <form action="{{route('customer.edit')}}" method="POST" id="editprofile">
                    @csrf
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="fname" value="{{$user->userprofile->fname}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="lname" value="{{$user->userprofile->lname}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="stateid" name="stateid" required>
                                @foreach($states as $state)
                                    <option @if($state->stateid === $user->userprofile->stateid) selected @endif value="{{$state->stateid}}">{{$state->statename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Contact Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="addy" name="address" rows="3" required placeholder="Suite E17A, Emab Plaza, Wuse 2" >{{$user->userprofile->address}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="staticEmail" disabled value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" disabled value="{{$user->phone}}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="editbutton">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {

        $('#editbutton').click(function (event) {
            event.preventDefault();
            let form = $('#editprofile');
            let route = form.attr('action');

            $.ajax({
                url:route,
                method:'POST',
                data: form.serialize(),
                success: function(data){
                    location.reload()
                },
                error: function(data){
                    state = $("#edit").html('');
                    $.each(data, function(index, value)
                    {
                        state.append('<div class="alert alert-danger"><strong>'+ value +'</strong><div>');
                    });
                }
            })
        })
    });
</script>
