<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    private $data = [];

    /**
     * ContactForm constructor.
     * @param array $data
     */
    public function __construct(Array $data = [])
    {
        $this->data = $data;
//        dd($this->data);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if (array_has($this->data, 'email') && !is_null($this->data['email'])) {
            $this->replyTo($this->data['email']);
        }
        return $this->to(config('mail.from.address'))
            ->from(config('mail.from.address'))
            ->subject('New Contact Message')
            ->markdown('emails.contact')
            ->with($this->data);
    }
}
