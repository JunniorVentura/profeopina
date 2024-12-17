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
        Schema::create('tbl_suscripciones', function (Blueprint $table) {
            $table->id('id_suscripcion'); // Clave primaria 
            $table->unsignedBigInteger('id_usuario'); 
            $table->string('tipo_suscripcion', 50); 
            $table->dateTime('fecha_inicio')->default(now()); 
            $table->dateTime('fecha_fin')->nullable(); 
            $table->unsignedBigInteger('id_estado_suscripcion'); 
            $table->foreign('id_usuario')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade'); 
            $table->foreign('id_estado_suscripcion')->references('id_estado_suscripcion')->on('tbl_estado_suscripcion')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_suscripciones');
    }
};
