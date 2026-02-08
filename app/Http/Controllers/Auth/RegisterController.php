<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use App\Mail\BienvenidaUsuario;  // El mail que recibe el usuario
use Illuminate\Support\Facades\Mail; // El motor de correos de Laravel

class RegisterController extends Controller
{
    // 1. Mostrar el formulario (la vista)
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // 2. Procesar el registro
    public function register(Request $request)
    {
        //VALIDACIÓN: Se comprueban que los datos cumplen las reglas
        ///Antes de tocar la base de datos, Laravel se asegura de que el email sea un email real, que no esté repetido 
        //(unique:users) y que la contraseña sea segura. Se añaden los mismos patrones que se utilizan en html y en javascript
        $request->validate([
            'nombre'    => 'required|string|max:50|regex:/^[a-zA-ZÀ-ÿ\s\']+$/u', //solo acepta letras, tildes, apostrofes y ñ
            'apellidos' => 'required|string|max:100,|regex:/^[a-zA-ZÀ-ÿ\s\']+$/u',
            'email'     => 'required|string|email|max:100|unique:users',
            'password'  => 'required|string|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/', //8caracteres, mayusc. minusc. num. carcater espec. si esta el campo confirmed laravel busca automaticamente el campo _confirmation, otro campo para confirmar la contraseña.
            'telefono' => 'required|string|max:20|regex:/^(\+[0-9]{1,4})?[0-9]{9}$/',  //+ seguido de 1 a 4 digitos y 9 digitos para el telefono. 
        ]);

        //CREACIÓN: Aquí entra en juego el $fillable y el cast de password
        //Esta función de Eloquent toma los datos y los envía al modelo.  Tal y como se indica en el 
        // $fillable nombre, apellidos, etc., sólo se guardaran estos datos en la tabla.
        $user = User::create([
            'nombre'    => $request->nombre,
            'apellidos' => $request->apellidos,
            'email'     => $request->email,
            'password'  => $request->password, // El 'cast' lo encriptará solo
            'telefono'  => $request->telefono,
            'rol'       => 'cli', // Por defecto, todos se registran como clientes
        ]);
        // 1. Enviamos el correo:
            Mail::to($user->email)->send(new BienvenidaUsuario($user));
        // 2. LOGIN AUTOMÁTICO: 
            //Le decimos a Laravel: "Este usuario que acabas de crear, identifícalo ya"
            //Conseguimos que se inicie la sesión en el servidor instantáneamente.
            Auth::login($user);
        //3. Detectará que el usuario ya está logueado y mostrará sus datos sin preguntar nada.
            return redirect()->route('perfil')->with('success', '¡Bienvenido al paraíso! Tu cuenta ha sido creada y ya estás identificado.');
    }
}
