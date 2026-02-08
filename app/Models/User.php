<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    // INDICAMOS LA TABLA Y LA CLAVE PRIMARIA REAL
    protected $table = 'users';
    protected $primaryKey = 'id';
    /**
     *Le está diciendo al sistema que lo que viene a continuación es una variable tipo lista y que $fillable debe contener datos tipo string
     * @var list<string>
     */
    protected $fillable = [
        'nombre',       // Antes era 'name' en Laravel
        'apellidos',    // campo de la tabla que Laravel no conoce
        'email',
        'password',
        'telefono',     // campo de la tabla que Laravel no conoce
        'rol',          // campo de la tabla que Laravel no conoce
    ];

    /**
     *
     * @var list<string>
     */
    protected $hidden = [ //para proteger la contraseña, solo permanece en el lado del servidor y no se mostrará en el cliente.
        'password',
        'remember_token',
    ];

    /**
     
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // Esta función permite que $user->reservas funcione
    public function reservas()
    {
        // 'id_usuario' es la columna en la tabla reservas, 'id' es la de users
        return $this->hasMany(Reserva::class, 'id_usuario', 'id');
    }
}
