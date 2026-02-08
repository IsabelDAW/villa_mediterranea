<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Muestra todas las reservas de la Villa para el Administrador.
     */
    public function indexReservas()
    {
        // Traemos todas las reservas pero con whith le decimos con 'user' que busque el metodo del Modelo de Reserva user()
        //también va a la tabla detalle_reservas(detalles) para buscar qué servicios/experiencias componen esa reserva. 
        //.servicio: para cada fila que encuentre en detalles, siga saltando hasta la tabla servicios_experiencias.   
        //De esta forma se trae la reserva, el nombre del usuario y el nombre del servicio todo de una vez.  
        $reservas = Reserva::with(['user', 'detalles.servicio'])
            ->orderBy('fecha_reserva', 'desc')
            ->get();

        return view('admin.reservas.index', compact('reservas'));
    }

    /**Permite al administrador cancelar cualquier reserva. */
    public function destroyReserva($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();

    //back() devuelve al administrador automáticamente a la página donde estaba (la lista de reservas).
        return back()->with('success', 'La reserva ha sido eliminada por el administrador.');
    }
}
