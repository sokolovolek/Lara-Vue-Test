<?php

namespace App\Mail\Employer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountApplicationRecieved extends Mailable
{
    use Queueable, SerializesModels;

    public $newUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user = array())
    {
        $this->newUser = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.employers.applicationReceived');
    }
}
