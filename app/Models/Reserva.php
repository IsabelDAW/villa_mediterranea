<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id_reserva'; // Tu clave primaria real
    public $timestamps = false;

    /**
     * Relación para el Administrador
     * El AdminController pide ->with('user') y le devuelve un solo uusario
     */
    public function user()
    {
        //Aquí le decimos al modelo Reserva: "Tú perteneces a un Usuario".
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    // Relación: Una reserva pertenece a un Usuario
    public function usuario()
    {
        // 'id_usuario' es la columna en la tabla reservas que apunta al 'id' de users
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    // Relación: Una reserva tiene muchos detalles al usar hasMany Laravel sabe que debe esperar una 
    //colección y no solo un objeto.
    public function detalles()
    {
        return $this->hasMany(DetalleReserva::class, 'id_reserva', 'id_reserva');
    }
}
