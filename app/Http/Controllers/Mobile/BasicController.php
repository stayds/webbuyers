<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Userprofile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BasicController extends Controller
{

    /**
     * @OA\Post(
     *     path="/register",
     *     tags={"user"},
     *     @OA\Response(response="200", description="Customer Registration.")
     * )
     */
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

        $token = $user->createToken('Bulkbuyers')->accessToken;

        return response()->json(['token' => $token], 200);

    }


    /**
     * @OA\Post(
     *     path="/access",
     *     tags={"user"},
     *     summary="Logs user into system",
     *     operationId="loginUser",
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="The email for login",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\Header(
     *             header="X-Rate-Limit",
     *             description="calls per hour allowed by the user",
     *             @OA\Schema(
     *                 type="integer",
     *                 format="int32"
     *             )
     *         ),
     *         @OA\Header(
     *             header="X-Expires-After",
     *             description="date in UTC when token expires",
     *             @OA\Schema(
     *                 type="string",
     *                 format="datetime"
     *             )
     *         ),
     *         @OA\JsonContent(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid username/password supplied"
     *     )
     * )
     */
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





    /**
     * @OA\Get(path="/api/user/detail",
     *   tags={"user"},
     *   summary="Get the details of an authenticated user",
     *   description="",
     *   operationId="getAuthUser",
     *   @OA\Response(
     *     response=200,
     *     description="successful operation",
     *     @OA\Schema(type="string"),
     *     @OA\Header(
     *       header="X-Rate-Limit",
     *       @OA\Schema(
     *           type="integer",
     *           format="int32"
     *       ),
     *       description="calls per hour allowed by the user"
     *     ),
     *     @OA\Header(
     *       header="X-Expires-After",
     *       @OA\Schema(
     *          type="string",
     *          format="date-time",
     *       ),
     *       description="date in UTC when token expires"
     *     )
     *   ),
     *   @OA\Response(response=400, description="Error xXx"),
     *     security={
     *       {"api_key": {}}
     *     }
     * )
     */
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

}
