<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Userprofile;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class BasicController extends Controller
{
    use VerifiesEmails;


    public function register(Request $request){
        $request['regmodeid'] = 1;
        $error =  Validator::make($request->all(),[
             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
             'password' => ['required', 'string', 'min:8'],
             'phone' => ['required','string','min:8','max:11','unique:users'],
             'fname' => ['required', 'string'],
             'lname' => ['required', 'string']
         ]);


        if($error->fails())
        {
            return response(['errors' => $error->messages(),'message'=>'Check data entered'], 401);
        }


        $user = User::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->fname,
            'regmodeid' => 1,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        Userprofile::create([
            'userid' => $user->userid,
            'stateid' => 2,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()]);

        $user->sendApiEmailVerificationNotification();

        $token = $user->createToken('Bulkbuyers')->accessToken;

        return response()->json(['token' => $token,'verify'=>route('verificationapi.verify',['id'=>$user->userid])], 200);

    }


    public function login(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status'=> 1
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('Bulkbuyers')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }


    public function details(){
        $user = auth()->user()->userprofile;
        $user['email'] = auth()->user()->email;
        $user['phone'] = auth()->user()->phone;

        return response()->json($user, 200);
    }

    public function update(Request $request)
    {
        $rules = [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'address' => 'required|min:6|string',
            //'stateid' => 'required',
            'dob'=>'required'
        ];

        $validator = Validator::make($request->except('_token'), $rules);

        if ($validator->fails()){
            return response()->json($validator->getMessageBag()->toArray(), 203);
        }

        $user = auth()->user();

        $profile = $user->userprofile;

        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->address = $request->address;
        $profile->dob = $request->dob;
        //$profile->stateid = $this->request->stateid;

        $profile->save();

        return response()->json('Profile Successfully updated', 200);
    }

    public function verify(Request $request) {
        $userid = $request->id;
        $user = User::findOrFail($userid);
        $date = date("Y-m-d g:i:s");
        /*
         *  to enable the “email_verified_at field of that user
         be a current time stamp by mimicing the must verify email feature
        */
        $user->email_verified_at = $date;
        $user->save();

        return response()->json("Email verified!",200);
    }
}
