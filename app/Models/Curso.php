<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'tbl_cursos';

    protected $fillable = ['codigo_curso', 'nombre', 'descripcion'];
}
