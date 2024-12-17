<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoCurso extends Model
{
    use HasFactory;

    protected $table = 'tbl_alumno_curso';

    protected $fillable = ['id_alumno', 'id_curso', 'id_colegio', 'fecha_inicio', 'fecha_fin', 'aprobado', 'calificacion'];

    public $incrementing = false;
    protected $primaryKey = ['id_alumno', 'id_curso', 'id_colegio'];
    public $timestamps = true;

    // Relación con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'id_alumno');
    }

    // Relación con Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    // Relación con Colegio
    public function colegio()
    {
        return $this->belongsTo(Colegio::class, 'id_colegio');
    }
}
