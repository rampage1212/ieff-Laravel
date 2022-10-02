<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $collection;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($collection)
    {
        $this->subject = $collection['subject'];
        $this->message = $collection['message'];
        $this->replyto = $collection['replyto'];
        $this->locale('en');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.default', ['contentMessage' => $this->message])->replyTo($this->replyto)->subject('New message received');
    }
}
