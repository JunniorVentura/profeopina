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
        Schema::create('tbl_reportes', function (Blueprint $table) {
            $table->id('id_reporte'); // Clave primaria 
            $table->unsignedBigInteger('id_reportante'); 
            $table->unsignedBigInteger('id_perfil_reportado')->nullable(); 
            $table->unsignedBigInteger('id_encuesta_reportado')->nullable(); 
            $table->string('motivo', 255); 
            $table->dateTime('fecha_reporte')->default(now()); 
            $table->unsignedBigInteger('id_estado_reporte'); 
            $table->foreign('id_reportante')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade'); 
            $table->foreign('id_perfil_reportado')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade'); 
            $table->foreign('id_encuesta_reportado')->references('id_encuesta')->on('tbl_encuestas')->onDelete('cascade'); 
            $table->foreign('id_estado_reporte')->references('id_estado_reporte')->on('tbl_estado_reporte')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reportes');
    }
};
