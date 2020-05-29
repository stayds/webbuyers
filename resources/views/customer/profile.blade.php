

    <section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        @include('customer.partials.menu')
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        @include('customer.partials.details')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {

            $('#editprofileform').submit(function (event) {
                event.preventDefault();
                let route = $(this).attr('action');
                $.ajax({
                    url:route,
                    method:'POST',
                    data: $(this).serialize(),
                    success: function(data){
                        if(data.success === true){
                            console.log(data);
                        }
                    }
                })
            })
        });
    </script>


