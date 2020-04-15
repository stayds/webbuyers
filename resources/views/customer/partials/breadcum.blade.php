<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('home')}}">home</a></li>
                        <li>My account</li>
                        <li class="pull-right">
                            <div>
                                @if($user->email_verified_at == null)
                                    <span class="text-danger">{{ __('Please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }}</span>,
                                    <a  class="text-blue font-weight-bold" href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->
