<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

 

    /**
     * Create a new message instance.
     *
     * @param string $name
     */


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newsletter')
                    ->subject('You Have Been Subscribed to Our Newsletter!');
    }
}
