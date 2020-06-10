<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Temporder;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        $temp = Temporder::where('userid', $user->userid)->get();

        if($temp){
            foreach ($temp as $key => $list){
               $this->getAddtocart($request,$list->productid, $temp);
            }
        }
        $wishcount = $user->products->count();
        $request->session()->put('wishlist', $wishcount);
    }

    protected function credentials(Request $request)
    {
        //checking status of user alongside email and password
        $credentials =  $request->only($this->username(), 'password');
        $credentials = array_add($credentials, 'status', '1');
        return $credentials;
    }



    public function logout(Request $request)
    {
        $cart = $request->session()->get('cart');

        if($cart) {
            $newcart = $cart->items;
            $this->storecart($newcart);
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    private function storecart($newcart){
        $data = [];
        $a = 0;
        $user = Auth::user();
        foreach($newcart as $list){

//            $data[$a]['productid'] = $list['item']['productid'];
//            $data[$a]['userid'] = $user->userid;
//            $data[$a]['qty'] = $list['qty'];
//            $data[$a]['created_at'] = Carbon::now();
//            $data[$a]['updated_at'] = Carbon::now();
            $data[] = [
                'productid' => $list['item']['productid'],
                'userid'=> $user->userid,
                'qty' => $list['qty'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            //++$a;
        }
       // dd($data);
        Temporder::insert($data);
//        $details = new Temporder();
//        $details->save($data);
    }

    private function getAddtocart($request, $productid, $model)
    {
        //$productid = Crypt::decrypt($productid);
        $product = Product::find($productid);
        $oldcart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->addItem($product, $productid);

        $request->session()->put('cart', $cart);

        $this->delrecord($model);
    }

    private function delrecord($model){
        foreach ($model as $data){
            Temporder::destroy($data->id);
        }

    }
}
