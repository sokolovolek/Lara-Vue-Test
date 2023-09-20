<?php

namespace App\Mail\SuperAdmin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstitutionAccept extends Mailable
{
    use Queueable, SerializesModels;

    public $institution;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($institution = array())
    {
        $this->institution = $institution;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.superadmin.admins.accept');
    }
}
