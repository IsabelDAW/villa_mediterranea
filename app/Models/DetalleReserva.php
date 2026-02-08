<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleReserva extends Model
{
    protected $table = 'detalle_reservas'; 
    protected $primaryKey = 'id_detalle'; 
    public $timestamps = false;

    public function servicio()
    {
        // Conecta id_servExp de detalles con id_servExp de la tabla servicios
        return $this->belongsTo(ServicioExperiencia::class, 'id_servExp', 'id_servExp');
    }
}
