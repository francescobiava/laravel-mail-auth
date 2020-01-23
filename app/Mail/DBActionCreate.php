<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DBActionCreate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $type;
    private $name;

    public function __construct($type, $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $type = $this->type;
        $name = $this->name;
        return $this->view('emails.DBActionCreate', compact('type', 'name'));
    }
}
