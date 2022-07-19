<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvitation extends Mailable
{
    use Queueable, SerializesModels;
    public $sub;
    public $id;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sub,$id,$name)
    {
        $this->sub = $sub;
        $this->id = $id;   
        $this->name = $name;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('doctor.id')
        ->with('id',$this->id)
        ->with('name',$this->name)
        ->subject($this->sub);
    }
}