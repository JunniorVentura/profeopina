<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoSuscripcion extends Model
{
    use HasFactory;

    protected $table = 'tbl_estado_suscripcion';

    protected $fillable = ['descripcion'];
}
