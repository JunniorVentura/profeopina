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
        Schema::create('tbl_profesores', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profesor')->primary(); // Clave primaria que referencia a `tbl_usuarios` 
            $table->string('especialidad', 255); 
            $table->string('grado_academico', 255); 
            $table->timestamps(); 
            
            $table->foreign('id_profesor')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_profesores');
    }
};
