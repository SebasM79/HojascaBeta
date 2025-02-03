<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialServicio extends Model
{
    use HasFactory;

    protected $table = 'materiales_servicios'; // Indica el nombre exacto de la tabla

    protected $fillable = [
        'servicio_contratado_id',
        'material_id',
        'proveedor_id',
        'cantidad'
    ];

    public function servicioContratado()
    {
        return $this->belongsTo(ServicioContratado::class, 'servicio_contratado_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
