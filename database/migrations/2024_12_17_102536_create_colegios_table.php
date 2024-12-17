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
        Schema::create('tbl_colegios', function (Blueprint $table) {
            $table->id('id_colegio');
            $table->string('nombre_completo', 255); 
            $table->string('ciudad', 255); 
            $table->text('portal')->nullable(); 
            $table->unsignedBigInteger('id_tipo_institucion');
            $table->timestamps();

            $table->foreign('id_tipo_institucion')->references('id_tipo')->on('tbl_tipos_institucion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_colegios');
    }
};
