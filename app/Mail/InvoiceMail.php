<?php

namespace App\Mail;

use App\User;
use App\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $setting;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Setting $setting)
    {
        $this->user = $user;
        $this->setting = $setting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invoice.send');
        //dd($this->view('emails.invoice.send'));
    }
}
