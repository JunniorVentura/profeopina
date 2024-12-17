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
        Schema::create('tbl_alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_alumno')->primary(); // Clave primaria que referencia a `tbl_usuarios` 
            $table->string('codigo_alumno', 20); 
            $table->timestamps(); 

            $table->foreign('id_alumno')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_alumnos');
    }
};
