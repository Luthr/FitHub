<?php

namespace App\Mail;

use App\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBooking extends Mailable
{
    use Queueable, SerializesModels;

    private $booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->to(config('mail.from.address'))
            ->from(config('mail.from.address'))
            ->replyTo($this->booking->email)
            ->subject('New Booking - ' . $this->booking->date)
            ->markdown('emails.new-booking')
            ->with(
                $this->booking->attributesToArray()
            );
    }
}
