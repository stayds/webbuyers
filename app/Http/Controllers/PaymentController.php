<?php

namespace App\Http\Controllers;

use App\Mail\UserPayment;
use App\Models\Billingaddress;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    public function redirectToGateway()
    {
        $this->validate($this->request, [
            'userid'   => 'required',
            'fname'   => 'required|string',
            'lname'   => 'required|string',
            'phone' => 'required|numeric|min:8|regex:/^([0-9\s\-\+\(\)]*)$/',
            'stateid' => 'required|numeric',
            'address' => 'required|string'
        ]);

        $billadd = $this->addbillingaddress();

        if ($billadd){
            return Paystack::getAuthorizationUrl()->redirectNow();
        }

        return redirect()->back();
    }

    private function addbillingaddress(){

        $user = Auth::user();
        $billing = Billingaddress::where('userid', $user->userid)->first();

        if($billing){
            $billing->firstname = $this->request->fname;
            $billing->lastname = $this->request->lname;
            $billing->phone = $this->request->phone;
            $billing->stateid = $this->request->stateid;
            $billing->address = $this->request->address;

            $billing->save();

            return true;
        }


        $billnew = new Billingaddress();
        $billnew->userid = $user->userid;
        $billnew->firstname = $this->request->fname;
        $billnew->lastname = $this->request->lname;
        $billnew->phone = $this->request->phone;
        $billnew->stateid = $this->request->stateid;
        $billnew->address = $this->request->address;
        $billnew->created_at = Carbon::now();
        $billnew->updated_at = Carbon::now();

        $billnew->save();

        return true;
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        $paydone = $this->createPay($paymentDetails);

        //dd($paydone);

        $user = $this->getUser();
        $orders = $this->getOrders($paydone->orderid);
        $orderdetails = $this->getOrderDetails($orders->orderid);

        \Mail::to($user)->send(new UserPayment($paydone, $orders, $user, $orderdetails));


        return view('customer.paymessage', compact('paydone','user'));

        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function getCustomerPayment(){

        $user = $this->getUser();
        $payment = Payment::where('userid', $user->userid);

        if($this->request->ajax()){
            return view('customer.payments.index', compact('payment'));
        }

    }

    private function createPay($paymentDetails){
        $user = $this->getUser();
        $payment = new Payment();
        //dd($paymentDetails);
        $orderid = $paymentDetails['data']['metadata']['orderid'];
        $payment->orderid = (int)$orderid;
        $payment->userid = $user->userid;
        $payment->paymentrefno = $paymentDetails['data']['reference'];
        $payment->paymentstatusid = ($paymentDetails['data']['status'] === "success") ? 2 : 1;
        $payment->amount = ($paymentDetails['data']['amount'])/100;

        $payment->save();

        $order = Order::where('orderid',(int)$orderid)->first();
        $order->ispaid = 1;
        $order->created_at = Carbon::now();
        $order->save();

        return $payment;
    }

    private function getOrders($id){
        return Order::find($id);
    }

    private function getOrderDetails($orderid){
        return Orderdetail::where('orderid',$orderid)->get();
    }

    private function getUser(){
        return Auth::user();
    }

}
