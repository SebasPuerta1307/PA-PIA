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
        Schema::create('proyecto_asignaturas', function (Blueprint $table) {
            $table->id();
        $table->foreignId('proyecto_id')->constrained('proyectos')->onDelete('cascade');
        $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('cascade');
        $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
        $table->string('grupo', 50);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_asignaturas');
    }
};
