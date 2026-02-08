<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioExperiencia extends Model
{
    // Especificar el nombre de la tabla a la que nos queremos conectar
    protected $table = 'servicios_experiencias'; //Mapea el nombre de tabla

    // Especificar el nombre de la clave primaria
    protected $primaryKey = 'id_servExp'; //Mapea la clave primaria personalizada

    // $fillable Propiedad de seguridad (necesaria para guardar datos)
    protected $fillable = [ //Permite la asignación masiva de atributos añadidos en esta lista
        'nomServExp',
        'descripcion',
        'imagen',
        'tipo',
        'precio',
    ];
}
