<!-- Nav tabs -->
<div class="dashboard_tab_button">
    <ul role="tablist" class="nav flex-column dashboard-list">
{{--        <li><a href="{{route('home')}}" data-toggle="tab" class="nav-link active" id="dashboard">Dashboard</a></li>--}}
        <li> <a href="{{route('customer.order')}}" data-toggle="tab" class="nav-link active" id="orders">Orders</a></li>
{{--        <li> <a href="{{route('customer.payment')}}" data-toggle="tab" class="nav-link" id="payments">Payments</a></li>--}}
        <li> <a href="{{route('customer.password')}}" data-toggle="tab" class="nav-link" id="pwd">Change Password</a></li>
        <li><a href="{{route('customer.detail')}}" data-toggle="tab" id="details" class="nav-link">Account details</a></li>
        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                            document.getElementById('logoff-form').submit();" class="nav-link">
                    {{ __('Logout') }}
                </a>
                <form id="logoff-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>
    </ul>
</div>
