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
        Schema::create('tbl_usuario_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario'); 
            $table->unsignedBigInteger('id_rol'); 
            $table->primary(['id_usuario', 'id_rol']); 
            $table->foreign('id_usuario')->references('id_usuario')->on('tbl_usuarios')->onDelete('cascade'); 
            $table->foreign('id_rol')->references('id_rol')->on('tbl_roles')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_usuario_roles');
    }
};
