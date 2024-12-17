<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoColegio extends Model
{
    use HasFactory;

    protected $table = 'tbl_alumno_colegio';

    protected $fillable = ['id_alumno', 'id_colegio', 'fecha_inicio', 'fecha_fin'];

    public $incrementing = false;
    protected $primaryKey = ['id_alumno', 'id_colegio', 'fecha_inicio'];
    public $timestamps = true;
}
