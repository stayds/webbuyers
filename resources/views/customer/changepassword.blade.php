

    <div class="col-xl-12">

        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Change Password</h4>
            <form action="{{route('customer.password.post')}}" method="POST" id="changePwdForm">
            @csrf
            <div id="status">

            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="password" class="col-form-label">Enter Password <span class="text-danger"> (minimum of 8)</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="lname" class="col-form-label">Confirm Password <span class="text-danger">(minimum of 8)</span></label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"  placeholder="Confirm Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-group col-md-4 pt-4">
                    <button style="margin-top:10px; background: #F07330" id="changePwdbttn"  class="btn btn-dark btn-block" type="submit">Submit</button>
                </div>
            </div>
        </form>
        </div>

    </div>

        <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function(){

                $('#changePwdForm').submit(function (event) {
                    event.preventDefault();
                    url = $(this).attr('action');
                    info = $(this).serialize();
                    $.ajax({
                        url:url,
                        method: 'POST',
                        dataType: 'json',
                        data: info,
                        success: function(data){
                            if(data.success === true) {
                                $.ajax
                                ({
                                    type: 'POST',
                                    url: '/logout',
                                    success: function()
                                    {
                                        location.reload();
                                    }
                                });
                            }else{
                                console.log(data.error);
                                err = data.error;
                                state = $("#status").html('');
                                $.each(err, function(index, value)
                                {
                                    state.append('<div class="alert alert-danger"><strong>'+ value +'</strong><div>');
                                });
                            }
                        }
                    });
                })
            });


        </script>



