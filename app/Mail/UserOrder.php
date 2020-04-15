<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order, $orderdetail;

    public function __construct($order,$detail)
    {
        $this->order = $order;
        $this->orderdetail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order');
    }
}
