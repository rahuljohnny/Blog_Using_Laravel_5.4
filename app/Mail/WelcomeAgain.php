<?php

namespace App\Mail;

use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeAgain extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(User $user)
    {
        $this->user = $user;  //todo: 1.DM this approach of constructor to have access to $user variable
                            //todo: 1.Define public $user to have access to $user variable
                          //todo: 2.We've to import App/User
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome-again');
    }
}
