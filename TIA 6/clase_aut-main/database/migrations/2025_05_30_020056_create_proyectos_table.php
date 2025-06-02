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
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
        $table->string('titulo');
        $table->text('descripcion')->nullable();
        $table->unsignedBigInteger('tipo_proyecto_id');
        $table->foreign('tipo_proyecto_id')->references('id')->on('tipos_proyecto');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
