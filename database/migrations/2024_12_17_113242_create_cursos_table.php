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
        Schema::create('tbl_cursos', function (Blueprint $table) {
            $table->id('id_curso'); // Clave primaria 
            $table->string('codigo_curso', 10); 
            $table->string('nombre', 255)->notNull(); 
            $table->string('descripcion', 500); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_cursos');
    }
};
