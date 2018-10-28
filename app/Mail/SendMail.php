<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $name;
    public $content;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$name, $email, $content)
    {
        $this->title = $title;
        $this->name = $name;
        $this->content = $content;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->title)
                    ->view('email.email');
    }
}
