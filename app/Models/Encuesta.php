<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $table = 'tbl_encuestas';

    protected $fillable = [
        'id_usuario', 'id_profesor', 'id_curso', 'metodologia', 
        'dificultad', 'volverias_llevar', 'uso_libros', 
        'asistencia_obligatoria', 'como_te_fue', 'texto_reseña', 'fecha'
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

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
}
