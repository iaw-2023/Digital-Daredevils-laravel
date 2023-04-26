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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->text('imagen_ruta')->nullable();
            $table->string('imagen_nombre_original')->nullable();
            $table->unsignedBigInteger('imagen_tamano')->nullable();
            $table->unsignedInteger('imagen_ancho')->nullable();
            $table->unsignedInteger('imagen_alto')->nullable();
            $table->string('nombre');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
