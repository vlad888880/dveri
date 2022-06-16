<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $doors;
    protected $name;
    protected $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($doors, $name, $phone)
    {
        $this->doors = $doors;
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail/order')
        ->with([
            'doors' => $this->doors,
            'name' => $this->name,
            'phone' => $this->phone,
        ])->subject('Заявка с товаром');
    }
}
