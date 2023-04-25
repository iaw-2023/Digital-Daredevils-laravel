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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('talle');
            $table->decimal('precio', 7, 2);
            $table->text('imagen_ruta')->nullable();
            $table->string('imagen_nombre_original')->nullable();
            $table->unsignedBigInteger('imagen_tamano')->nullable();
            $table->unsignedInteger('imagen_ancho')->nullable();
            $table->unsignedInteger('imagen_alto')->nullable();
            $table->string('modelo');
            $table->string('marca');
            $table->foreignId('categoria_id')->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
