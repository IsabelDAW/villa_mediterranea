<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class FormularioRecibido extends Mailable
{
  public $datos; // Aquí se guardará el nombre, ciudad, etc.

public function __construct($datos)
{
    $this->datos = $datos;
}

public function envelope(): Envelope
{
    return new Envelope(
        subject: 'Confirmación de contacto - Villa Mediterránea',
    );
}

public function content(): Content
{
    return new Content(
        view: 'emails.contacto', // Enviamos al usuario a la vista
    );
}

}
