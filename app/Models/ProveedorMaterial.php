<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'material_id',
        'precio',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
    public function material()
    {
        return $this->belongsTo(Materiales::class, 'material_id');
    }
}
