<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\DetalleReserva;
use Illuminate\Support\Facades\Auth;
use App\Models\ServicioExperiencia;
use Illuminate\Support\Facades\Session;

class ReservaController extends Controller
{
    // para ver las reservas
    public function index()
    {
        $user = Auth::user();
        $reservas = Reserva::where('id_usuario', $user->id)
            ->with('detalles.servicio')
            ->orderBy('fecha_inicio', 'desc')
            ->get();
        return view('reservas.index', compact('reservas'));
    }

    // para guardar automáticamente
    public function store(Request $request)
    {
        // 1. Validar que el usuario esté logueado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Buscar el servicio y lo guarda en la variable $servicio
        $servicio = ServicioExperiencia::find($request->servicio_id);

        if (!$servicio) { //si el id es null nos mostrará el mensaje de error.
            return back()->with('error', 'Servicio no encontrado');
        }

        // 3. Calculamos el precio total n personas i* precio serv-exp
        $numPersonas = $request->input('personas', 1);
        $totalCalculado = $servicio->precio * $numPersonas;

        // 4. Crear Reserva
        $reserva = new Reserva();
        $reserva->id_usuario = Auth::user()->id; // Usa 'id' que es la clave en users
        $reserva->email_usuario = Auth::user()->email;
        $reserva->fecha_reserva = now();
        $reserva->fecha_inicio = now();
        $reserva->n_personas = $numPersonas;
        $reserva->precio = $totalCalculado;
        $reserva->save();

        // 5. Crear Detalle
        $detalle = new DetalleReserva();
        $detalle->id_reserva = $reserva->id_reserva;
        $detalle->id_servExp = $servicio->id_servExp;
        $detalle->cantidad = $numPersonas;
        $detalle->precio = $totalCalculado;
        $detalle->save();

        return redirect()->route('reservas.index')->with('success', 'Reserva realizada correctamente');
    }

    public function destroy($id)
    {
        // Buscamos la reserva asegurando que pertenezca al usuario logueado
        $reserva = Reserva::where('id_reserva', $id)
            ->where('id_usuario', Auth::id())
            ->first(); //first() devuelve un único objeto o null.

        if ($reserva) {
            $reserva->delete();

            // Forzamos el guardado de sesión
            Session::save();

            return redirect()->route('reservas.index')->with('success', 'La experiencia ha sido cancelada.');
        }

        // Si algo falla, redirigimos al perfil por seguridad
        return redirect()->route('reservas.index')
            ->with('error', 'No se pudo cancelar la experiencia. Es posible que ya no exista.');
    }
}
