<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MobilePayment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $paymentdetail, $order, $detail, $user;

    public function __construct($payments, $orders, $user,$orderdetails)
    {
        $this->paymentdetail = $payments;
        $this->order = $orders;
        $this->detail = $orderdetails;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.mobilepay')->subject('Order Payment');
    }
}
