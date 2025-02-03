<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'direccion',
        'estado',
        'tarea',
        'observacion'
    ];

    /**
     * Relación con los servicios contratados (Uno a Muchos).
     * Un empleado puede estar asignado a varios servicios.
     */
    public function serviciosContratados()
    {
        return $this->hasMany(ServicioContratado::class, 'empleado_id');
    }
}
