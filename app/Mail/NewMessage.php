<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @return void
     */

    private $messaggio;

    public function __construct($nuovo_messaggio)
    {
      $this->messaggio=$nuovo_messaggio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.show')->with(['messaggio'=>$this->messaggio]);
    }
}
