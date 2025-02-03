<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'telefono', 'email', 'direccion', 'estado'];

    public function serviciosContratados()
    {
        return $this->hasMany(ServicioContratado::class, 'cliente_id');
    }
}
