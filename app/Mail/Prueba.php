<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Prueba extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // TODO: ¿Me tengo que crear una cuenta de correo?
        // https://github.com/mailhog/MailHog
        return $this->from('hello@laramusi.com', 'Laramusi')
            ->view('emails.prueba');
    }
}
