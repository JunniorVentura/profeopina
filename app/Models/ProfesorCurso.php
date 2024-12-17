<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorCurso extends Model
{
    use HasFactory;

    protected $table = 'tbl_profesor_curso';

    protected $fillable = ['id_profesor', 'id_curso', 'id_colegio', 'fecha_inicio', 'fecha_fin'];

    public $incrementing = false;
    protected $primaryKey = ['id_profesor', 'id_curso', 'id_colegio'];
    public $timestamps = true;

    // Relación con Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor');
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
