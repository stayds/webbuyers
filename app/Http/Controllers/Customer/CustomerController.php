<?php

namespace App\Http\Controllers\Customer;

use App\Mail\UserOrder;
use App\Models\Billingaddress;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Discountorder;
use App\Models\Discountordhistory;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware(['auth','verified']);
    }

    public function index()
    {

//        $user = $this->getUser();
//        $order = Order::where(['userid'=>$user->userid,'ispaid'=>1])->get();
//        $totalspent = $order->sum('totalcost');
//        $orderno = $order;
        $user = Auth::user();
        $orders = Order::with('payment')
            ->where('userid',$user->userid)
            ->orderBy('updated_at','DESC')
            ->paginate(7);

        //$view = view('customer.dashboard', compact('user','totalspent','orderno'));

//        if($this->request->ajax()){
//             return view('customer.partials.dashcontent', compact('user','totalspent','orderno'));
//        }

        //return $view;
       return view('customer.dashboard', compact('orders','user'));
    }

    public function edit()
    {
        $user = $this->getUser();
        $states = State::where('stateid',2)->get();
        $billing = Billingaddress::where('userid',$user->userid)->first();

        if($billing){
            $billstate = State::find($billing->stateid);
        }

        if($this->request->ajax()){
            return view('customer.partials.profile',compact('user','states','billing','billstate'));
        }

    }

    public function update()
    {
        $rules = [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'address' => 'required|min:6|string',
            'stateid' => 'required'
        ];

        $validator = Validator::make($this->request->except('_token'), $rules);

        if ($validator->fails()){
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }


        $user = $this->getUser();

        $profile = $user->userprofile;

        $profile->fname = $this->request->fname;
        $profile->lname = $this->request->lname;
        $profile->address = $this->request->address;
        $profile->stateid = $this->request->stateid;

        $profile->save();

        //return $this->edit()->with(['success'=> true]);
        //return response()->json(['success'=> true]);
        return redirect()->back();
    }


    public function checkout(Request $request){

        $user = $this->getUser();

        if($request->orderid){
            $orderstate = $this->getTheOrder($request->orderid);
        }else{
            $orderstate = $this->addtodb($user);
        }

        //remove cart from the session
        $request->session()->forget('cart');

        if($orderstate){
            $myorders = $orderstate;
            $mydetails = Orderdetail::where('orderid',$orderstate->orderid)->get();

            //\Mail::to($user)->send(new UserOrder($orderstate,$mydetails,$user));

            $states = State::where('stateid',2)->get();
            return view('customer.checkout', compact('user','myorders','states','mydetails'));
        }

        return redirect()->back();
    }

    public function getChangePwd(){

        if ($this->request->ajax()){
            return view('customer.changepassword');
        }
        return view('customer.changepassword');
    }

    public function postChangePwd(){
        $rules = [
                'password' => 'required|min:8|confirmed'
        ];

        $validator = $this->valid($rules);

        if ($validator->fails()){
            return response()->json(['error'=>$validator->getMessageBag()->toArray()]);
        }

        $user = $this->getUser();
        $user->password = Hash::make($this->request->password);
        $user->save();

        //return redirect()->route('logout');
        return response()->json(['success'=> true]);
    }

    private function getUser(){
        return Auth::user();
    }

    private function genrefno() {
        $number = mt_rand(1000000100, 9999999999); // better than rand()

        if ($this->orderrefno($number)) {
            return genrefno();
        }

        return $number;
    }

    private function getTheOrder($id){
        return Order::where('orderid', $id)->first();
    }

    private function orderrefno($number) {
        return Order::where('orderrefno',$number)->exists();
    }

    private function addtodb($user){

        $cart = $this->request->session()->get('cart');
        $discount = ($cart->discount * $cart->totalPrice)/100;
        $order = new Order();

        $order->userid = $user->userid;
        $order->orderstatid = 2;
        $order->orderrefno = mt_rand(100000, 999999);
        $order->discount = $discount;
        $order->totalcost = $cart->totalPrice - $discount;
        $order->qty = $cart->totalQty;

        $order->save();


        $data = [];
        $a = 0;
        foreach($cart->items as $list){
            $data[$a]['productid'] = $list['item']['productid'];
            $data[$a]['orderid'] = $order->orderid;
            $data[$a]['quantity'] = $list['qty'];
            $data[$a]['unitprice'] = $list['item']['price'];
            $data[$a]['totalprice'] = $list['price'];
            $data[$a]['created_at'] = Carbon::now();
            $data[$a]['updated_at'] = Carbon::now();
            ++$a;
        }

        $details = new Orderdetail();
        $details->insert($data);

        if($cart->discountid > 0){
            $discheck = Discountorder::where(['discountid'=>$cart->discountid, 'userid'=>$user->userid])->first();

            if($discheck){
                $dishistory = new Discountordhistory();
                $dishistory->discountid = $discheck->discountid;
                $dishistory->userid = $discheck->userid;
                $dishistory->orderid = $discheck->orderid;
                $dishistory->save();

                $discheck->orderid = $order->orderid;
                $discheck->used = $discheck->used + 1;
                $discheck->save();
            }
            else{
                $discheck = new Discountorder();
                $discheck->discountid = $cart->discountid;
                $discheck->userid = $user->userid;
                $discheck->orderid = $order->orderid;
                $discheck->used = 1;
                $discheck->save();
            }

         }


        return $order;

    }

    public function updatebilling()
    {
        $rule = [
            'address' => 'required|min:6|string',
            'stateid' => 'required'
        ];

        $validcheck = $this->valid($rule);

        if ($validcheck->fails()){
            return response()->json(['error'=>$validcheck->getMessageBag()->toArray()]);
        }


        $user = $this->getUser();
        $billing = Billingaddress::where('userid',$user->userid)->first();
        $billing->userid = $user->userid;
        $billing->address = $this->request->address;
        $billing->stateid = $this->request->stateid;

        $billing->save();

        return response()->json(['success'=> true]);
    }

    private function valid($rule){
        return Validator::make($this->request->except('_token'), $rule);
    }



}
