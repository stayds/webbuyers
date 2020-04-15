<div class="tab-pane fade" id="account-details">
    <h3>Account details </h3>
    <div class="login">
        <div class="login_form_container">
            <div class="account_login_form">
                <form action="{{route('customer.edit')}}" method="POST">
                    <div class="input-radio">
                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                    </div> <br>
                    <input type="hidden" name="userid" value="">
                    <label>First Name</label>
                    <input type="text" name="fname" value="{{$profile->fname}}">
                    <label>Last Name</label>
                    <input type="text" name="lname" value="{{$profile->lname}}">
                    <label>Phone</label>
                    <input type="text" name="email" value="{{$profile->phone}}">
                    <label>Email</label>
                    <input type="password" name="email" value="{{$profile->user->email}}" disabled>
                    <label>Birthdate</label>
                    <input type="date" placeholder="MM/DD/YYYY" value="{{$profile->dob}}" name="birthday">
                    <span class="example">(E.g.: 05/31/1970)</span>
                    <br>

                    <br>

                    <div class="save_button primary_btn default_button">
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
