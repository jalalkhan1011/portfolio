<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $admin;
    public $userMail;
    public $userMessage;
    public $userName;
    public function __construct($admin,$userMail,$userMessage,$userName)
    {
        $this->admin = $admin;
        $this->userMail =  $userMail;
        $this->userMessage = $userMessage;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contactMail',['admin' => $this->admin,'userMail' => $this->userMail,'userMessage' => $this->userMessage,'userName' => $this->userName]);
    }
}
