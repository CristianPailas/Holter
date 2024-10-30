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
        Schema::create('registros_holters', function (Blueprint $table) {
            $table->id();
            $table->date('hora'); // Es recomendable usar 'timestamp' si quieres almacenar la hora también.
            $table->string('fc_min', 3);
            $table->string('rc_medio', 3);
            $table->string('fc_max', 3);
            $table->string('total_latidos', 10);
            $table->unsignedBigInteger('paciente_id'); // Asegúrate de que la tabla se llama 'pacientes'
            $table->unsignedBigInteger('holter_id');
            $table->unsignedBigInteger('medico_id');
            $table->timestamps();

            // Relaciones foráneas
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('holter_id')->references('id')->on('holters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('medico_id')->references('id')->on('medicos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros_holters');
    }
};
