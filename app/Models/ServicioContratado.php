<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioContratado extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'fecha_inicio',
        'fecha_fin',
        'observaciones',
        'costo', // Se actualizará automáticamente
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function materiales()
    {
        return $this->belongsToMany(Material::class, 'materiales_servicio', 'servicio_contratado_id', 'material_id')
            ->withPivot('proveedor_id', 'cantidad')
            ->withTimestamps();
    }

    public function calcularCostoTotal()
    {
        $costoMateriales = $this->materiales->sum(function ($material) {
            $proveedorMaterial = ProveedorMaterial::where('material_id', $material->id)
                ->where('proveedor_id', $material->pivot->proveedor_id)
                ->first();
            return $proveedorMaterial ? $proveedorMaterial->precio * $material->pivot->cantidad : 0;
        });

        $costoManoObra = 5000; // Modificar según reglas de negocio

        $this->update(['costo' => $costoMateriales + $costoManoObra]);

        return $costoMateriales + $costoManoObra;
    }
}
