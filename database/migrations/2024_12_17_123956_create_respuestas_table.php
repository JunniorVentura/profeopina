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
        Schema::create('tbl_respuestas', function (Blueprint $table) {
            $table->id('id_respuesta'); // Clave primaria 
            $table->unsignedBigInteger('id_encuesta'); 
            $table->unsignedBigInteger('id_usuario'); 
            $table->string('texto_respuesta', 500); 
            $table->timestamps(); 
            
            $table->foreign('id_encuesta')->references('id_encuesta')->on('tbl_encuestas')->onDelete('cascade'); 
            $table->foreign('id_usuario')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_respuestas');
    }
};
