<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuario_roles';

    protected $fillable = ['id_usuario', 'id_rol'];

    public $incrementing = false;
    protected $primaryKey = ['id_usuario', 'id_rol'];
    public $timestamps = true;

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
