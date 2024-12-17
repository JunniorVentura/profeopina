<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'tbl_alumnos';

    protected $fillable = ['id_alumno', 'codigo_alumno'];

    public $incrementing = false;
    protected $primaryKey = 'id_alumno';

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_alumno');
    }
}
