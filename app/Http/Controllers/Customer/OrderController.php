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
        $orders = Order::with('payment')
                        ->where('userid',$user->userid)
                        ->paginate(7);

        if($this->request->ajax()){
            $orders = Order::with('payment')->where('userid',$user->userid)
                ->orderBy('updated_at','DESC')->paginate(5);

            return view('customer.partials.orders', compact('orders'));
        }
        return view('customer.partials.orders', compact('orders'));
    }

    public function getOrderDetails($id){
        $order = Order::find($id);
        $details = Orderdetail::where('orderid', $id)->get();

        if($this->request->ajax()){
            return view('customer.partials.orderdetail', compact('details','order'));
        }



    }



}
