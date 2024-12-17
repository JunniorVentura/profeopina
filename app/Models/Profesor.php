<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'tbl_profesores';

    protected $fillable = ['id_profesor', 'especialidad', 'grado_academico'];

    public $incrementing = false;
    protected $primaryKey = 'id_profesor';

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_profesor');
    }
}
