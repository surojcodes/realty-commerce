<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'admin@hamrorealty.com';	
	    $name = 'Admin';
	    $subject = 'Contact Email';
        return $this->markdown('email.newContactEmail')
            ->from($address,$name)
            ->subject($subject)
            ->with('data',$this->data);
    }
}
