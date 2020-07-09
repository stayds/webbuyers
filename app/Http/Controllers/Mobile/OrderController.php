<?php

namespace App\Http\Controllers\Mobile;

use App\Mail\MobilePayment;
use App\Mail\UserOrder;
use App\Mail\UserPayment;
use App\Models\Billingaddress;
use App\Models\Discountorder;
use App\Models\Discountordhistory;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Payment;
use App\Models\Tempdetail;
use App\Models\Temporder;
use App\Models\Userprofile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;

class OrderController extends Controller
{

    public function getUserOrders(){
        $user = $this->authUser();
        $userOrder = Order::where(['userid'=>$user->userid, 'ispaid'=>1])
                            ->with('orderdetails.product')
                            ->get();
        if($userOrder->isEmpty()){
            return response()->json(['message' => 'No order exists'], 401);
        }
        return response()->json(['orders' => $userOrder], 200);
    }

    public function getOrderDetail($id){
        $detail = Orderdetail::where('orderid',$id)->with('product:productid,productname,description')->get();

        if($detail->isEmpty()){
            return response()->json(['message' => 'No order exists'], 401);
        }
        return response()->json($detail, 200);
    }

    private function authUser(){
        return auth()->user();
    }

    public function tempCart(Request $request){
        $order = new Temporder();
        $user = $this->authUser();
        $order->totalcost = $request->totalcost;
        $order->qty = $request->totalqty;
        $order->userid = $user->userid;
        $order->save();

        $data = [];
        $a = 0;

        foreach($request->products as $list){
            $data[$a]['productid'] = $list['productid'];
            $data[$a]['temporderid'] = $order->id;
            $data[$a]['quantity'] = $list['quantity'];
            $data[$a]['unitprice'] = $list['unitprice'];
            $data[$a]['totalprice'] = $list['totalprice'];
            $data[$a]['created_at'] = Carbon::now();
            $data[$a]['updated_at'] = Carbon::now();
            ++$a;
        }

        $details = new Tempdetail();
        $details->insert($data);

        return response()->json('Cart list Successfully Scored', 200);
    }

    public function getCartlist(){
        $user = $this->authUser();

        $cart = Temporder::where('userid',$user->userid)->with('tempdetails')->latest()->first();
        return response()->json($cart, 200);
    }

    public function tempCarte(Request $request){

        if($request->tempid){
            $user = $this->authUser();
            $tempord = Temporder::where(['userid'=>$user->userid, 'id'=>$request->tempid])->first();

            if($tempord != null){

                $tempord->totalcost = $tempord->totalcost + $request->totalprice;
                $tempord->qty = $tempord->qty + $request->quantity;
                $tempord->save();

                $order = new Tempdetail();

                $order->productid = $request->productid;
                $order->temporderid = $request->tempid;
                $order->quantity = $request->quantity;
                $order->unitprice = $request->unitprice;
                $order->totalprice = $request->totalprice;

                $order->save();

                return response()->json($order->temporderid, 200);

            }
            return response()->json("cart doesn't exist", 403);

        }

        $order = new Temporder();
        $user = $this->authUser();
        $order->totalcost = $request->totalcost;
        $order->qty = $request->totalqty;
        $order->userid = $user->userid;

        $order->save();

        $details = new Tempdetail();
        $details->productid = $request->productid;
        $details->temporderid = $order->id;
        $details->quantity = $request->quantity;
        $details->unitprice = $request->unitprice;
        $details->totalprice = $request->totalprice;

        $details->save();

        return response()->json($details->temporderid, 200);


    }

    public function Ordersadd(Request $request)
    {
        
        $order = new Order();
        $user = $this->authUser();
        $profile = Userprofile::where('userid', $user->userid)->first();

        $order->userid = $user->userid;
        $order->orderstatid = 2;
        $order->orderrefno = mt_rand(100000, 999999);
        $order->totalcost = $request->totalcost;
        $order->qty = $request->totalqty;
        $order->discount = $request->discount;
        $order->ispaid = 0;

        $order->save();

        $data = [];
        $a = 0;
        foreach ($request->products as $list) {
            $data[$a]['productid'] = $list['productid'];
            $data[$a]['orderid'] = $order->orderid;
            $data[$a]['quantity'] = $list['quantity'];
            $data[$a]['unitprice'] = $list['unitprice'];
            $data[$a]['totalprice'] = $list['totalprice'];
            $data[$a]['created_at'] = Carbon::now();
            $data[$a]['updated_at'] = Carbon::now();
            ++$a;
        }

        $details = new Orderdetail();
        $details->insert($data);

        $this->addAddress($user, $request, $profile);

        //record discount code used
        if ($request->discountid > 0) {

            $discheck = Discountorder::where(['discountid' => $request->discountid, 'userid' => $user->userid])->first();

            if ($discheck) {
                $dishistory = new Discountordhistory();
                $dishistory->discountid = $discheck->discountid;
                $dishistory->userid = $discheck->userid;
                $dishistory->orderid = $discheck->orderid;
                $dishistory->save();

                $discheck->orderid = $order->orderid;
                $discheck->used = $discheck->used + 1;
                $discheck->save();
            } else {
                $discheck = new Discountorder();
                $discheck->discountid = $request->discountid;
                $discheck->userid = $user->userid;
                $discheck->orderid = $order->orderid;
                $discheck->used = 1;
                $discheck->save();
            }


            return response()->json($order, 200);
        }

        return response()->json($order, 200);
    }

    public function payment(Request $request){
        $user = $this->authUser();
        $mydetails = Orderdetail::where('orderid',$request->orderid)->get();
        $order = Order::find($request->orderid);
        $order->ispaid = 1;
        $order->save();

        $payment = new Payment();
        $payment->userid = $user->userid;
        $payment->paymentrefno = $request->paymentrefno;
        $payment->orderid = $order->orderid;
        $payment->paymentstatusid = 2;
        $payment->amount = ($request->totalcost)/100;
        $payment->message = "Mobile Transaction Successful";
        $payment->save();

        \Mail::to($user)->send(new MobilePayment($payment, $order, $user, $mydetails));

        return response()->json('Transaction Successfully Saved', 200);
    }

    private function genrefno() {
        $number = mt_rand(1000000100, 9999999999); // better than rand()

        if ($this->orderrefno($number)) {
            return genrefno();
        }

        return $number;
    }

    private function orderrefno($number) {
        return Order::where('orderrefno',$number)->exists();
    }

    private function addAddress($user, $req, $profile){

        $billing = Billingaddress::where('userid', $user->userid)->first();

        if($billing){
            $billing->firstname = $profile->fname;
            $billing->lastname = $profile->lname;
            $billing->phone = $user->phone;
            $billing->stateid = $profile->stateid;
            $billing->address = $req->address;

            $billing->save();

            return true;
        }

        $billnew = new Billingaddress();
        $billnew->userid = $user->userid;
        $billnew->firstname = $profile->fname;
        $billnew->lastname = $profile->lname;
        $billnew->phone = $user->phone;
        $billnew->stateid = $profile->stateid;
        $billnew->address = $req->address;
        $billnew->created_at = Carbon::now();
        $billnew->updated_at = Carbon::now();

        $billnew->save();

        return true;
    }

    public function getTransactRef(Request $request){
        $code = Paystack::genTranxRef();
        return response()->json($code,200);
    }
}
