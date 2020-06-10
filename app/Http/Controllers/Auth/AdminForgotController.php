<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;

class AdminForgotController extends Controller{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        Config::set("auth. defaults.passwords","admins");
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.adminforgot');
    }

    public function postForgotten(Request $request){

        if($request->ajax()){
            $this->validateEmail($request);

            $emailcheck = Admin::where('email',$request->email)->first();
            if($emailcheck->status > 0) {
                // We will send the password reset link to this user. Once we have attempted
                // to send the link, we will examine the response then see the message we
                // need to show to the user. Finally, we'll send out a proper response.
                $response = $this->broker()->sendResetLink(
                    $this->credentials($request)
                );

                return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
            }
            return false;
        }
    }

    public function broker()
    {
        return Password::broker('admins');
    }

}
