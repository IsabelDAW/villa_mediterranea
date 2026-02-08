<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Necesario para gestionar sesiones

class LoginController extends Controller
{
    //Es la función que se ejecuta cuando el usuario pulsa el botón "Entrar".
    public function login(Request $request)
    {
        // 1.Validamos que los campos no lleguen vacíos
        //. Laravel comprueba que los datos cumplen las reglas. Si las reglas no se cumplen,
        //Laravel detiene todo, vuelve a la página anterior y rellena la variable $errors automáticamente.
        $credentials = $request->validate([
            'email' => ['required', 'email'], //email: Laravel comprueba que lo escrito tenga formato de correo real (que tenga un @ y un dominio como .com o .es). No sirve escribir "hola".
            'password' => ['required'],
        ]);

        // 2. "Una vez que se ha validado que los datos tienen el formato correcto, esta sección decide si se le permite al usuario entrar"
        //Intentar iniciar sesión (Auth::attempt encripta y compara automáticamente) Toma las credenciales (email y contraseña), busca en la tabla de usuarios el email y, si lo encuentra,
        //compara la contraseña que escribió el usuario con la que está encriptada en la base de datos
        // El segundo parámetro ($request->remember) es para la casilla "Recordarme" devuelve true si esta marcada y mantiene la sesión abierta
        //Si la validación tiene éxito, Laravel guarda los datos limpios en la variable $credentials. 
        //Esta variable será la que uses después para el comando Auth::attempt($credentials), realiza el hashing (encriptación) comparativa
        if (Auth::attempt($credentials, $request->has('remember'))) {

            // 3. Si es correcto, regenerar la sesión por seguridad 
            //destruye el identificador de sesión antiguo y crea uno nuevo totalmente distinto ahora que el usuario se ha identificado
            $request->session()->regenerate();

            // 4. Redirigir a la home con un mensaje de bienvenida
            //with(...): Crea un mensaje temporal (flash message) en la sesión.
            //Auth::user()->nombre: Aquí accedemos a la base de datos para sacar el nombre real del usuario que acaba de entrar y ponerlo en el mensaje de bienvenida.
            return redirect()->intended('/')->with('login_success', '"Bienvenido al paraíso, ' . Auth::user()->nombre . '!');
        }

        // 5. Si falla, volver atrás con un error
        //crea la variable $errors que luego uso en el Modal.
        //Cuando el Modal se abra, el comando {{ $errors->first() }} leera "Login incorrecto".
        return back()->withErrors([
            'email' => 'Login incorrecto',
        ])->onlyInput('email'); //->Gracias a esto, y al value="{{ old('email') }}" que hay en el HTML, 
        //el usuario no tendrá que volver a escribir su correo si se equivoca en la clave. El correo aparecerá ya escrito.
        //pero la clave no se guardara.
    }

    //CERRAR SESIÓN
    public function logout(Request $request)
    {
        // 1. Cerramos la sesión en el motor de Laravel
        Auth::logout();

        // 2. Invalidamos la sesión actual del usuario por seguridad, se destruye con los datos del usuario
        $request->session()->invalidate();

        // 3. Regeneramos el token CSRF para evitar ataques en el futuro es decir, cambia la "cerradura" de seguridad (CSRF) 
        //para que nadie pueda suplantar la sesión que acabas de cerrar.
        $request->session()->regenerateToken();

        // 4. Redirigimos a la home con un mensaje
        return redirect('/')->with('login_success', 'Has cerrado sesión correctamente. ¡Vuelve pronto!');
    }

    //vamos a pasar el usuario a la vista (perfil.blade) para poder usar sus datos:
    //busca en la sesión quién está conectado y trae toda su fila de la base de datos (nombre, email, rol, etc.).
    public function showPerfil()
    {
        // Usamos Auth::user() Si el usuario no tiene una sesión activa, lo expulsa automáticamente hacia la página de inicio o el login
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }
        //Indica que debe cargar el archivo que guardamos en la carpeta user.
        return view('user.perfil', compact('user')); //-> Envía los datos del usuario a la vista para que podamos usarlos allí.
    }


    //Para que el usuario pueda editar su perfil
    public function edit_Perfil()
    {

        $user = \App\Models\User::find(Auth::id());
        return view('user.edit', compact('user'));
    }


public function editPerfil($id = null)
{
    // Si pasamos un ID por la URL, buscamos a ese usuario (Admin editando)
    // Si NO pasamos nada, usamos el ID del usuario logueado (Usuario editando su perfil)
    $userId = $id ?: Auth::id();

    $user = \App\Models\User::find($userId);

    // Si por algún motivo no encuentra al usuario, redirigimos atrás
    if (!$user) {
        return redirect()->back()->with('error', 'Usuario no encontrado');
    }

    return view('user.edit', compact('user'));
}


    // 2. Función para procesar los cambios y guardarlos en la base de datos 
    public function updatePerfil(Request $request)
    {
        $id = Auth::id();
        // 1. Obtener al usuario identificado
        // 1. Forzamos a Laravel a buscar al usuario a través del Modelo User 
        //llamada directa a la "clase maestra" de seguridad
        // Usamos el ID del usuario autenticado para encontrarlo en la BD
        $user = \App\Models\User::find(Auth::id());

        // 2. Validar los datos (evita que nos envíen campos vacíos o correos repetidos)
        //$request Es el objeto que contiene todo lo que el usuario escriba en el formulario.
        $request->validate([
            'nombre' => 'required|string|max:50|regex:/^[a-zA-ZÀ-ÿ\s\']+$/u', ////solo acepta letras, tildes, apostrofes y ñ
            'apellidos' => 'required|string|max:100,|regex:/^[a-zA-ZÀ-ÿ\s\']+$/u', //////solo acepta letras, tildes, apostrofes y ñ
            'email' => 'required|string|email|max:100' . $user->id, //-> Informa que ignore su propio email para que no lo rechace, y no piense que está duplicado.
            'telefono' => 'required|string|max:20|regex:/^(\+[0-9]{1,4})?[0-9]{9}$/',  //+ seguido de 1 a 4 digitos y 9 digitos para el telefono. 
        ]);

        // 3. Actualizar los datos en el objeto $user
        $user->nombre = $request->nombre;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        $user->telefono = $request->telefono;

        // 4. Guardar físicamente en BD, Laravel traduce automáticamente esta línea a una sentencia 
        //SQL de tipo UPDATE usuarios SET nombre = ... WHERE id = ....
        $user->save();

        // 5. Redirigir de vuelta al perfil con un mensaje de éxito
          //Esto crea una "variable flash" en la sesión que dura solo un instante para avisar al usuario de que todo ha ido bien.
        return redirect()->route('perfil')->with('success', '¡Perfil actualizado correctamente!'); 
    }

    public function indexUsuarios()
    {
        // Traemos todos los usuarios de la tabla 'users'
        $usuarios = \App\Models\User::all();

        // Enviamos la lista a una nueva vista
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function showLoginForm()
    {
        // el login es un modal en la home:
        return redirect('/');
    }
}
