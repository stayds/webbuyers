<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public function __construct(Request $request)
    {
        $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->email->subject)
                    ->from($this->email->email, $this->email->name)
                   ->view('email.contact');
    }
}
