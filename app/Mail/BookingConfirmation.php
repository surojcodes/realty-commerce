<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
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
	    $subject = 'Tour Schedule Confirmation';
        return $this->markdown('email.tourConfirmation')
            ->from($address,$name)
            ->subject($subject)
            ->with('data',$this->data);
    }
}
