<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;

use App\Models\Orderdetail;
use App\Models\User;
use App\Models\Userprofile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware(['auth','verified']);
    }

    public function getOrders(){

        $user = Auth::user();
        $orders = Order::with('payment')->where('userid',$user->userid)->get();

        if($this->request->ajax()){
            return view('customer.partials.orders', compact('orders'));
        }
    }

    public function getOrderDetails($id){

        $details = Orderdetail::where('orderid', $id)->get();

        if($this->request->ajax()){
            return view('customer.partials.orderdetail', compact('details'));
        }



    }



}
