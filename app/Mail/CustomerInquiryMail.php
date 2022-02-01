<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerInquiryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $inquiries;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inquiries)
    {
        $this->inquiries = $inquiries;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.customer-inquiry')
                    ->subject($this->inquiries['subject']);
    }
}
