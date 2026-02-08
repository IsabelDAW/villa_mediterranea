<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; // si decidimos enviar los mensajes en segudo plano.

class BienvenidaUsuario extends Mailable
{
    use SerializesModels;

    public $user; // Hacemos pública la variable para que la vista la lea

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('¡Bienvenido a Villa Mediterránea!')
                    ->view('emails.bienvenida'); // Ruta de la vista
    }
}