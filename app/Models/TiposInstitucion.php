<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposInstitucion extends Model
{
    use HasFactory;

    protected $table = 'tbl_tipos_institucion';

    protected $fillable = ['descripcion'];
}
