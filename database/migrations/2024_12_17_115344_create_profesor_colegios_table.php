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
        Schema::create('tbl_profesor_colegio', function (Blueprint $table) {
            $table->unsignedBigInteger('id_profesor'); 
            $table->unsignedBigInteger('id_colegio'); 
            $table->dateTime('fecha_inicio')->notNull(); 
            $table->dateTime('fecha_fin')->nullable(); 
            $table->primary(['id_profesor', 'id_colegio', 'fecha_inicio']); 
            $table->foreign('id_profesor')->references('id_profesor')->on('tbl_profesores')->onDelete('cascade'); 
            $table->foreign('id_colegio')->references('id_colegio')->on('tbl_colegios')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_profesor_colegio');
    }
};
