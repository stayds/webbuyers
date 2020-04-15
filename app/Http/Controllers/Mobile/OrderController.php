<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Orderdetail;
use App\Models\Tempdetail;
use App\Models\Temporder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{

    public function getUserOrders(){
        $user = $this->authUser();
        $userOrder = $user->orders;
        if($userOrder->isEmpty()){
            return response()->json(['orders' => $userOrder], 200);
        }
        return response()->json(['orders' => $userOrder], 200);
    }

    public function getOrderDetail($id){
        $detail = Orderdetail::where('orderid',$id)->get();
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


}
