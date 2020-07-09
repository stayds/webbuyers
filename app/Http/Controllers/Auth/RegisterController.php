<?php

namespace App\Http\Controllers\Auth;

use App\Mail\EmailVerify;
use App\Models\State;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\Registration;
use App\Models\Userprofile;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    use RegistersUsers;


    protected $redirectTo = '/product/list'; //home


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','regex:/(0)[0-9]/','not_regex:/[a-z]/','size:11','unique:users'],
            'stateid' => ['required'],
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string']
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'name' => $data['fname'],
            'phone' => $data['phone'],
            'regmodeid' => 2,
            'api_token' => Str::random(20),
            'password' => Hash::make($data['password']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Userprofile::create([
            'userid' => $user->userid,
            'stateid' => $data['stateid'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()]
        );

       // \Mail::to($user->email)->send(new Registration($user));

        return  $user;
    }
    public function showRegistrationForm()
    {
        $states = State::where('stateid', 2)->get();
        return view('auth.register', compact('states'));
    }



}
