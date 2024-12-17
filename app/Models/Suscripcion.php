<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $table = 'tbl_suscripciones';

    protected $fillable = ['id_usuario', 'tipo_suscripcion', 'fecha_inicio', 'fecha_fin', 'id_estado_suscripcion'];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relación con EstadoSuscripcion
    public function estadoSuscripcion()
    {
        return $this->belongsTo(EstadoSuscripcion::class, 'id_estado_suscripcion');
    }
}
