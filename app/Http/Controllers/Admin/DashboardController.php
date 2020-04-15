<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['admin','backinvalidate']);
    }

    public function index(){
        $products = $this->products();
        $orders = $this->orders();
        $user = $this->customers();
        $payment = $this->payments();
        return view('admin.user.home', compact('orders','products','user','payment'));
    }

    private function orders(){
        $data = Order::where('ispaid', 1)->get();
        return $data->count();
    }

    private function products(){
        $data = Product::all();
        return $data->count();
    }

    private function customers(){
        $data = User::all();
        return $data->count();
    }

    private function payments(){
        $payment = Payment::where('paymentstatusid',2)->get()->sum('amount');
        return $payment;
    }

}
