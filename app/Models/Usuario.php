<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_usuarios';

    protected $fillable = [
        'nombre', 'apellido', 'dni', 'correo', 'contrasena', 'foto_perfil',
        'departamento', 'ciudad', 'codigo_pais', 'codigo_region',
        'id_estado_cuenta', 'id_estado_perfil'
    ];

    protected $hidden = [
        'contrasena',
    ];

    // Relación con EstadoCuenta
    public function estadoCuenta()
    {
        return $this->belongsTo(EstadoCuenta::class, 'id_estado_cuenta');
    }

    // Relación con EstadoPerfil
    public function estadoPerfil()
    {
        return $this->belongsTo(EstadoPerfil::class, 'id_estado_perfil');
    }

    // Relación con Roles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'tbl_usuario_roles', 'id_usuario', 'id_rol');
    }
}

