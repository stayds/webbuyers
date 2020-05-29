<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Address</h5>
            </div>
            <div class="modal-body">
                <div id="editaddress">

                </div>
                <form id="editbillingform" action="{{route('billing.edit')}}" method="POST">
                    <div class="form-group row">
                        <label for="addy" class="col-sm-3 col-form-label">Billing Address</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="addy" name="address" rows="3" placeholder="Suite E17A, Emab Plaza, Wuse 2" >{{ ($billing != null) ? $billing->address : $user->userprofile->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="stateid" name="stateid">
                                {{ $location = ($billing)? $billing : $user->userprofile }}
                                @foreach($states as $state)
                                    <option @if($location->stateid === $state->stateid) selected @endif value="{{$state->stateid}}">{{$state->statename}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="billbutton" class="btn btn-primary">Save changes</button>
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

        $('#billbutton').click(function (event) {
            event.preventDefault();
            let form = $('#editbillingform');
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
