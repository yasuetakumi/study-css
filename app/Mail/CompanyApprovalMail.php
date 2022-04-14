<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyApprovalMail extends Mailable
{
    use Queueable, SerializesModels;
    public $approval;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($approval)
    {
        $this->approval = $approval;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.company-approval')
                    ->from(env('NOREPLY_SITE_EMAIL', 'no-reply@real-estate-media.com'))
                    ->subject('Your application has been approved');
    }
}
