<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendForgotEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address='inscripcionesfunauta@gmail.com';
        $name = 'Coagronorte';
        $subject = 'Reestablecer contraseña';
        return $this->view('emails.reestablecer-contrasena')
                    ->from($address, $name)
                    ->subject($subject);
    }
}
