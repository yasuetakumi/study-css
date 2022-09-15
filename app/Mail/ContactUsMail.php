<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\Types\This;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $type)
    {
        $this->content = $content;
        $this->type = $type;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->type == 'user' ? 'mail.contact-us' : 'mail.contact-us-admin')
                ->from('no-reply@taberuba.com', 'たべるば')
                ->subject($this->type == 'user' ? '【たべるば】お問い合わせを受け付けました。' : '【たべるば】webサイトからお問い合わせを受け付けました。');

    }
}
