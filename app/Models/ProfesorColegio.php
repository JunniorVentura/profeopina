<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesorColegio extends Model
{
    use HasFactory;

    protected $table = 'tbl_profesor_colegio';

    protected $fillable = ['id_profesor', 'id_colegio', 'fecha_inicio', 'fecha_fin'];

    public $incrementing = false;
    protected $primaryKey = ['id_profesor', 'id_colegio', 'fecha_inicio'];
    public $timestamps = true;
}
