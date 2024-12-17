<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'tbl_reportes';

    protected $fillable = ['id_reportante', 'id_perfil_reportado', 'id_encuesta_reportado', 'motivo', 'fecha_reporte', 'id_estado_reporte'];

    // Relación con Usuario (reportante)
    public function reportante()
    {
        return $this->belongsTo(Usuario::class, 'id_reportante');
    }

    // Relación con Usuario (perfil reportado)
    public function perfilReportado()
    {
        return $this->belongsTo(Usuario::class, 'id_perfil_reportado');
    }

    // Relación con Encuesta (encuesta reportada)
    public function encuestaReportada()
    {
        return $this->belongsTo(Encuesta::class, 'id_encuesta_reportado');
    }

    // Relación con EstadoReporte
    public function estadoReporte()
    {
        return $this->belongsTo(EstadoReporte::class, 'id_estado_reporte');
    }
}
