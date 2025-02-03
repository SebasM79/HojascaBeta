<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materiales_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_contratado_id')->constrained('servicio_contratados')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('material_id')->constrained('materiales')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('proveedor_id')->constrained('proveedores')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales_servicios');
    }
};
