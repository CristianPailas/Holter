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
            $table->unsignedBigInteger('pacientes_id'); // Asegúrate de que la tabla se llama 'pacientes'
            $table->unsignedBigInteger('holters_id');
            $table->unsignedBigInteger('especialistas_id');
            $table->timestamps();

            // Relaciones foráneas
            $table->foreign('pacientes_id')->references('id')->on('pacientes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('holters_id')->references('id')->on('holters')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('especialistas_id')->references('id')->on('especialistas')->onUpdate('cascade')->onDelete('cascade');
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
