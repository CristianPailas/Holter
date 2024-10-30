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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();
            $table->string('apellidos');
            $table->string('identificacion')->nullable();
            $table->string('edad')->nullable();
            $table->string('genero');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->timestamps();
            # edad, Correo y teléfono
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
