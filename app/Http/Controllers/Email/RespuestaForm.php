<?php

namespace App\Http\Controllers\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormularioRecibido; // Importamos el mailable (el sobre)

class RespuestaForm extends Controller
{
    public function enviarContacto(Request $request)
    {
        // 1. Validamos todos los campos del formulario
        $datos = $request->validate([
            'nombre'    => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'email'     => 'required|email',
            'telefono'  => ['required', 'regex:/^(\+[0-9]{1,4})?[0-9]{9}$/'],
            'ciudad'    =>'required|string|max:50',
             'pais'      =>'required|string|max:50'
        ]);

        // 2. Enviar el correo usando la clase Mailable
        Mail::to($request->email)->bcc('villamediterranea.luxury@gmail.com')->send(new FormularioRecibido($datos));


        return redirect()->back()->with('success', '¡Correo enviado!');
    }
}