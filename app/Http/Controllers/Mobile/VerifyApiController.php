<?php

namespace App\Http\Controllers\Mobile;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class VerifyApiController extends Controller
{
    use VerifiesEmails;

    public function verify(Request $request)
    {
        $userID = $request->userid’;
        $user = User::findOrFail($userID);
        $date = Carbon::now();
        $user->email_verified_at = $date;
        $user->save();

        return response()->json(['message' => "Email verified!"]);
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message'=>"User already have verified email!"], 422);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => "The notification has been resubmitted"]);

    }

}
