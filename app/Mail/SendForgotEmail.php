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
     * URL de recuperar contraseña
     * @var string
     */
    protected $url;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->url;
        $address='inscripcionesfunauta@gmail.com';
        $name = 'Coagronorte';
        $subject = 'Reestablecer contraseña';
        return $this->view('emails.reestablecer-contrasena',
                    compact('url'))
                    ->from($address, $name)
                    ->subject($subject);
    }
}
