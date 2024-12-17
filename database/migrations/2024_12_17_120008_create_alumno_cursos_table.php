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
        Schema::create('tbl_alumno_curso', function (Blueprint $table) {
            $table->unsignedBigInteger('id_alumno'); 
            $table->unsignedBigInteger('id_curso'); 
            $table->unsignedBigInteger('id_colegio'); 
            $table->dateTime('fecha_inicio')->notNull(); 
            $table->dateTime('fecha_fin')->nullable(); 
            $table->boolean('aprobado')->default(false); 
            $table->decimal('calificacion', 5, 2)->nullable(); 
            $table->primary(['id_alumno', 'id_curso', 'id_colegio']); 
            $table->foreign('id_alumno')->references('id_alumno')->on('tbl_alumnos')->onDelete('cascade'); 
            $table->foreign('id_curso')->references('id_curso')->on('tbl_cursos')->onDelete('cascade'); 
            $table->foreign('id_colegio')->references('id_colegio')->on('tbl_colegios')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_alumno_curso');
    }
};
