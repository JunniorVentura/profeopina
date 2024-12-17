<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;

    protected $table = 'tbl_colegios';

    protected $fillable = ['nombre_completo', 'ciudad', 'portal', 'id_tipo_institucion'];

    public function tipoInstitucion()
    {
        return $this->belongsTo(TiposInstitucion::class, 'id_tipo_institucion');
    }
}

