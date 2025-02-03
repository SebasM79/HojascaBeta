<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_material',
        'tipo',
        'corte_por_cantidad',
        'precio'
    ];

    // Relación con Proveedores (Muchos a Muchos)
    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'proveedor_materiales', 'material_id', 'proveedor_id')
            ->withPivot('precio')
            ->withTimestamps();
    }

    // Relación con Servicios Contratados (Muchos a Muchos)
    public function servicios()
    {
        return $this->belongsToMany(ServicioContratado::class, 'materiales_servicios', 'material_id', 'servicio_contratado_id')
            ->withPivot('proveedor_id', 'cantidad')
            ->withTimestamps();
    }
}
