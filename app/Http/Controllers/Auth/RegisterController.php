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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/product/list'; //home

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Userold
     */
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

        \Mail::to($user->email)->send(new Registration($user));

        return  $user;
    }
    public function showRegistrationForm()
    {
        $states = State::where('stateid', 2)->get();
        return view('auth.register', compact('states'));
    }



}
