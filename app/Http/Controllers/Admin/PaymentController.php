<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Paystack;

class PaymentController extends Controller
{
    public function getTransactions(){
       //$data  = Paystack::getAllTransactions();
        $tranx = paystack()->getAllTransactions();

        return view('admin.payment.translist', compact('tranx'));
    }

}
