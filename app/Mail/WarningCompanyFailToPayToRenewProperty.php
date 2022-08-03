<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WarningCompanyFailToPayToRenewProperty extends Mailable
{
    use Queueable, SerializesModels;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //if there is NOREPLY_SITE_EMAIL variable in env then set from
        if(env('NOREPLY_SITE_EMAIL')){
            return $this->from(env('NOREPLY_SITE_EMAIL'))
                    ->subject('Your property has been removed')
                    ->view('mail.WarningCompanyFailToPayToRenewProperty');
        }

        return $this->subject('Your property has been removed')
                    ->view('mail.WarningCompanyFailToPayToRenewProperty');
    }
}
