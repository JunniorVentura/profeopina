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
        Schema::create('tbl_encuestas', function (Blueprint $table) {
            $table->id('id_encuesta'); // Clave primaria 
            $table->unsignedBigInteger('id_usuario'); 
            $table->unsignedBigInteger('id_profesor'); 
            $table->unsignedBigInteger('id_curso'); 
            $table->integer('metodologia')->check(function ($column) { $column->between(1, 5); }); 
            $table->integer('dificultad')->check(function ($column) { $column->between(1, 5); }); 
            $table->boolean('volverias_llevar')->notNull(); $table->boolean('uso_libros')->notNull(); 
            $table->boolean('asistencia_obligatoria')->notNull(); 
            $table->string('como_te_fue', 255)->nullable(); 
            $table->string('texto_reseña', 1000)->notNull(); 
            $table->dateTime('fecha')->default(now()); // Utilizar el método now()
            $table->foreign('id_usuario')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade'); 
            $table->foreign('id_profesor')->references('id_profesor')->on('tbl_profesores')->onDelete('cascade'); 
            $table->foreign('id_curso')->references('id_curso')->on('tbl_cursos')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_encuestas');
    }
};
