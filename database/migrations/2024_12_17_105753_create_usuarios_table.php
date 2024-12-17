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
        Schema::create('tbl_usuarios', function (Blueprint $table) {
            $table->id('id_usuario'); // Clave primaria 
            $table->string('nombre'); 
            $table->string('apellido'); 
            $table->string('dni')->unique(); 
            $table->string('correo')->unique(); 
            $table->string('contrasena'); 
            $table->string('foto_perfil')->nullable(); 
            $table->string('departamento')->nullable(); 
            $table->string('ciudad')->nullable(); 
            $table->char('codigo_pais', 2)->nullable(); 
            $table->char('codigo_region', 3)->nullable(); 
            $table->unsignedBigInteger('id_estado_cuenta')->nullable(); 
            $table->unsignedBigInteger('id_estado_perfil')->nullable(); 
            $table->timestamps(); 
            
            $table->foreign('id_estado_cuenta')->references('id_estado_cuenta')->on('tbl_estado_cuenta'); 
            $table->foreign('id_estado_perfil')->references('id_estado_perfil')->on('tbl_estado_perfil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuarios');
    }
};
